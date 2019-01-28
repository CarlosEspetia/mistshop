<?php

namespace mistshop\Http\Controllers;

use Illuminate\Http\Request;

use mistshop\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Collection;

use mistshop\Http\Requests\IngresoFormRequest;

use mistshop\Ingreso;

use mistshop\DetalleIngreso;

use DB;

use Carbon\Carbon;

use Response;


class IngresoController extends Controller
{
    public function  __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request)
        {
            $query = trim($request->get('searchText'));
            $ingresos = DB::table('ingreso as in')
            ->join('persona as per','in.idproveedor','=','per.idpersona')
            ->join('detalle_ingreso as din','in.idingreso','=','din.idingreso')
            ->select('in.idingreso','in.fecha_hora','per.nombre','in.tipo_comprobante','in.serie_comprobante','in.num_comprobante','in.impuesto','in.estado',DB::raw('sum(din.cantidad*precio_compra) as total'))
            ->where('in.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('in.idingreso','desc')
            ->groupBy('in.idingreso','in.fecha_hora','per.nombre','in.tipo_comprobante','in.serie_comprobante','in.num_comprobante','in.impuesto','in.estado')
            ->paginate(7);
            return view('compras.ingreso.index',['ingresos'=>$ingresos,'searchText'=>$query]);
        }

    }

    public function create()
    {
        $personas = DB::table('persona')->where('tipo_persona','=','Proveedor')->get();
        $articulos = DB::table('articulo as art')
        ->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo')
        ->where('art.estado','=','Activo')
        ->get();
        return view('compras.ingreso.create',['personas'=> $personas,'articulos' => $articulos]);
    }

    public function store(IngresoFormRequest $request)
    {
        try
        {
            DB::beginTransaction();
            //Cabecera del ingreso
            $ingreso = new Ingreso;
            $ingreso->idproveedor = $request->get('idproveedor');
            $ingreso->tipo_comprobante = $request->get('tipo_comprobante');
            $ingreso->serie_comprobante = $request->get('serie_comprobante');
            $ingreso->num_comprobante = $request->get('num_comprobante');
            $miTime = Carbon::now('America/Cancun');
            $ingreso->fecha_hora = $miTime->toDateTimeString();
            $ingreso->impuesto = '16';
            $ingreso->estado = 'A';
            $ingreso->save();
            //Detalle ingreso.
            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            for($i = 0; $i < count($idarticulo); $i++)
            {
                $detalle = new DetalleIngreso();
                $detalle->idingreso = $ingreso->idingreso;
                $detalle->idarticulo = $idarticulo[$i];
                $detalle->cantidad = $cantidad[$i];
                $detalle->precio_compra = $precio_compra[$i];
                $detalle->precio_venta = $precio_venta[$i];
                $detalle->save();
            }

            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollbck();
        }
        return Redirect::to('compras/ingreso');
    }

    public function show($id)
    {
        $ingreso = DB::table('ingreso as in')
            ->join('persona as per','in.idproveedor','=','per.idpersona')
            ->join('detalle_ingreso as din','in.idingreso','=','din.idingreso')
            ->select('in.idingreso','in.fecha_hora','per.nombre','in.tipo_comprobante','in.serie_comprobante','in.num_comprobante','in.impuesto','in.estado',DB::raw('sum(din.cantidad*precio_compra) as total'))
            ->where('in.idingreso','=',$id)
            ->first();
        $detalles = DB::table('detalle_ingreso as d')
            ->join('articulo as a','d.idarticulo','=','a.idarticulo')
            ->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
            ->where('d.idingreso','=',$id)
            ->get();
        return view('compras.ingreso.show',['ingreso'=>$ingreso,'detalles'=>$detalles]);
    }

    public function destroy($id)
    {
        $ingreso = Ingreso::findOrfail($id);
        $ingreso->estado = 'C';
        $ingreso->update();
        return Redirect::to('compras/ingreso');
    }
}
