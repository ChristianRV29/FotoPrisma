<?php

namespace FotoPrisma\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use FotoPrisma\Http\Requests;
use FotoPrisma\Servicio; 
use FotoPrisma\Http\Requests\ProductoFormRequest;

use DB;

class ProductoController extends Controller
{
 
   /*public function __construct()
    {
        //$this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request)
        {

            $query=trim($request->get('searchText'));
            $servicios=DB::table('servicio as serv')
            ->join('Categoria as cat','serv.idCategoria','=','cat.idCategoria')
            ->select('serv.idServicio','cat.Nombre as Categoria','serv.Nombre','serv.Descripcion','serv.Precio','serv.Imagen', 'serv.Existencias','serv.Estado')
            ->where('serv.Nombre','LIKE','%'.$query.'%')
            ->where('serv.Estado','<>','Eliminado')
            ->where('cat.Nombre','=','Producto')            
            ->orderBy('serv.idServicio','desc')
            ->paginate(5);


            return view('inventario.producto.index',["servicios"=>$servicios,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=DB::table('categoria')->where('Estado','=','Activo')->get();
        return view("inventario.producto.create",["categorias"=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoFormRequest $request)
    {
        $servicio=new Servicio;

        $servicio->idCategoria='2';
        $servicio->Nombre=$request->get('Nombre');
        $servicio->Descripcion=$request->get('Descripcion');
        $servicio->Precio=$request->get('Precio');
        $servicio->Existencias=$request->get('Existencias');                    

        if(Input::hasFile('Imagen')){

            $file=Input::file('Imagen');
            $file->move(public_path().'/Imagenes/Servicios',$file->getClientOriginalName());

            $servicio->Imagen=$file->getClientOriginalName();
        }

        $servicio->Estado='Activo';

        $servicio->save();

        return Redirect::to('inventario/producto');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("inventario.producto.show",["servicio"=>Servicio::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio=Servicio::findOrFail($id);
        $categorias=DB::table('categoria')->where('Estado','=','Activo')->get();

        return view("inventario.producto.edit",["servicio"=>$servicio, "categorias"=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoFormRequest $request, $id)
    {
        
        $servicio=Servicio::findOrFail($id);
        
        $servicio->idCategoria=$request->get('idCategoria');
        $servicio->Nombre=$request->get('Nombre');
        $servicio->Descripcion=$request->get('Descripcion');
        $servicio->Precio=$request->get('Precio');   
        $servicio->Existencias=$request->get('Existencias');         
        
        if(Input::hasFile('Imagen')){

            $file=Input::file('Imagen');
            $file->move(public_path().'/Imagenes/Servicios',$file->getClientOriginalName());

            $servicio->Imagen=$file->getClientOriginalName();
        }
        $servicio->Estado=$request->get('Estado');
    
        $servicio->update();

        return Redirect::to('inventario/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio=Servicio::findOrFail($id);
        $servicio->Estado='Eliminado';
        $servicio->update();

        return Redirect::to('inventario/producto');
    }
}
