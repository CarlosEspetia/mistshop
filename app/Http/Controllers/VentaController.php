<?php

namespace mistshop\Http\Controllers;

use Illuminate\Http\Request;

use mistshop\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Collection;

use mistshop\Http\Requests\VentaFormRequest;

use mistshop\Venta;

use mistshop\DetalleVenta;

use DB;

use Carbon\Carbon;

use Response;

class VentaController extends Controller
{
    public function  __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request)
        {
            $query = trim($request->get('searchText'));
            $ventas = DB::table('venta as v')
            ->join('persona as per','v.idcliente','=','per.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_hora','per.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
            ->where('v.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('v.idventa','desc')
            ->groupBy('v.idventa','v.fecha_hora','per.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado')
            ->paginate(7);
            return view('ventas.venta.index',['ventas'=>$ventas,'searchText'=>$query]);
        }

    }

    public function create()
    {
        $personas = DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        $articulos = DB::table('articulo as art')
        ->join('detalle_ingreso as di','art.idarticulo','=','di.idarticulo')
        ->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo','art.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
        ->where('art.estado','=','Activo')
        ->where('art.stock','>','0')
        ->groupBy('articulo','art.idarticulo','art.stock')
        ->get();
        return view('ventas.venta.create',['personas'=> $personas,'articulos' => $articulos]);
    }

    public function store(VentaFormRequest $request)
    {
        try
        {
            DB::beginTransaction();
            //Cabecera del ingreso
            $venta = new Venta;
            $venta->idcliente = $request->get('idcliente');
            $venta->tipo_comprobante = $request->get('tipo_comprobante');
            $venta->serie_comprobante = $request->get('serie_comprobante');
            $venta->num_comprobante = $request->get('num_comprobante');
            $venta->total_venta = $request->get('total_venta');
            $miTime = Carbon::now('America/Cancun');
            $venta->fecha_hora = $miTime->toDateTimeString();
            $venta->impuesto = '16';
            $venta->estado = 'A';
            $venta->save();
            //Detalle ingreso.
            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $precio_venta = $request->get('precio_venta');

            for($i = 0; $i < count($idarticulo); $i++)
            {
                $detalle = new DetalleVenta();
                $detalle->idventa = $venta->idventa;
                $detalle->idarticulo = $idarticulo[$i];
                $detalle->cantidad = $cantidad[$i];
                $detalle->descuento = $descuento[$i];
                $detalle->precio_venta = $precio_venta[$i];
                $detalle->save();
            }

            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollbck();
        }
        return Redirect::to('ventas/venta');
    }

    public function show($id)
    {
        $venta = DB::table('venta as v')
            ->join('persona as per','v.idcliente','=','per.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_hora','per.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
            ->where('v.idventa','=',$id)
            ->first();
        $detalles = DB::table('detalle_venta as d')
            ->join('articulo as a','d.idarticulo','=','a.idarticulo')
            ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
            ->where('d.idventa','=',$id)
            ->get();
        return view('ventas.venta.show',['venta'=>$venta,'detalles'=>$detalles]);
    }

    public function destroy($id)
    {
        $venta = Venta::findOrfail($id);
        $venta->estado = 'C';
        $venta->update();
        return Redirect::to('ventas/venta');
    }
}
