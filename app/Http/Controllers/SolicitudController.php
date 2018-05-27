<?php

namespace FotoPrisma\Http\Controllers;

use Illuminate\Http\Request;

use FotoPrisma\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use FotoPrisma\Http\Requests\SolicitudFormRequest;

use FotoPrisma\Solicitud;
use FotoPrisma\Detalle;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection; 

class SolicitudController extends Controller
{
 

    /*public function __construct()
    {
        //$this->middleware('auth');
    }*/


	 public function index(Request $request)
    {
    	if($request){

    		$query=trim($request->get('searchText'));
    		$solicitudes=DB::table('Solicitud as sol')
    			->join('Usuario as us','sol.idUsuario','=','us.Documento')
    			->join('Detalle as det','sol.idSolicitud','=','det.idSolicitud')
    			->select('sol.idSolicitud','sol.Fecha_Solicitud','sol.Fecha_Efectiva','us.Nombre','sol.Impuesto','sol.Total','sol.Estado') 
    			->where('sol.idSolicitud','LIKE','%'.$query.'%')
    			->orderBy('sol.idSolicitud','desc')
    			->groupBy('sol.idSolicitud','sol.Fecha_Solicitud','sol.Fecha_Efectiva','us.Nombre','sol.Impuesto','sol.Total','sol.Estado')
    			->paginate(10);

    			return view('solicitudes.solicitud.index',["solicitudes"=>$solicitudes,"searchText"=>$query]);

    	}
    }

     


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    	$usuarios=DB::table('Usuario as us')        
        ->select(DB::raw('CONCAT(us.Documento, " - ",us.Nombre) AS usuario'))
        ->where('idRol','=','2')
        ->get();

        $servicios=DB::table('Servicio as serv')      
        ->join('Detalle as det','serv.idServicio','=','det.idServicio')
        ->join('Categoria as cat','serv.idCategoria','=','cat.idCategoria')
        ->select(DB::raw('CONCAT(cat.Nombre, " - ",serv.Nombre) AS servicio'),'serv.idServicio','serv.Existencias','serv.Precio')        
        ->where('serv.Existencias','>','0')
        ->groupBy('servicio','serv.idServicio','serv.Existencias')                
        ->get();
    		
        return view("solicitudes.solicitud.create",["usuarios"=>$usuarios,"servicios"=>$servicios]);        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitudFormRequest $request)
    {
       try{

       		DB::beginTransaction();
       		$solicitud=new Solicitud;
       		$solicitud->idUsuario=$request->get('idUsuario');

       		$mytime = Carbon::now('America/Bogota');          
       		$solicitud->Fecha_Solicitud=$mytime->toDateTimeString();
          $solicitud->Fecha_Efectiva=$request->get('Fecha_Efectiva');       		
       		$solicitud->Estado='Revision';

       		$solicitud->save();

       		$idServicio = $request->get('idServicio');
       		$cantidad = $request->get('Cantidad');

       		$cont = 0;

       		while($cont < count($idServicio)){

       			$detale = new Detalle();
       			$detalle->idSolicitud=$solicitud->idSolicitud;
       			$detalle->idServicio=$idServicio[$cont];
       			$detalle->Cantidad=$cantidad[$cont];

       			$detalle->save();
       			$cont=$cont+1;

       		}

       		DB::commit();

        }catch(\Exception $e){

       		DB::roolback();
       }

       return Redirect::to('solicitudes.solicitud');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $solicitud=DB::table('Solicitud as sol')
       		->join('Usuario as us','sol.idUsuario','=','us.Documento')
       		->join('Detalle as det','sol.idSolicitud','=','det.idSolicitud')
       		->select('sol.idSolicitud','sol.Fecha_Solicitud','sol.Fecha_Efectiva','us.Nombre','sol.Impuesto','sol.Total','sol.Estado')
       		->where('sol.idSolicitud','=',$id)
       		->first();

       $detalles=DB::table('Detalle as det')
          ->join('Servicio as serv','det.idServicio','=','serv.idServicio')
          ->join('Categoria as cat','cat.idCategoria','=','serv.idCategoria')       	
          ->select(DB::raw('CONCAT(cat.Nombre, " - ",serv.Nombre) AS servicio'),'det.Cantidad','serv.Precio as precio')              		
       		->where('det.idSolicitud','=',$id)
       		->get();

       		return view("solicitudes.solicitud.show",["solicitud"=>$solicitud,"detalles"=>$detalles]);       		

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$solicitud=Solicitud::findOrFail($id);
     	$solicitud->Estado=('Rechazada');

     	$solicitud->update();

     	return Redirect::to('solicitudes/solicitud');

    }   


}
