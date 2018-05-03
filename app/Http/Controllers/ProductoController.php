<?php

namespace FotoPrisma\Http\Controllers;

use Illuminate\Http\Request;

use FotoPrisma\Http\Requests;
use FotoPrisma\Producto;
use Illuminate\Support\Facades\Redirect;
use FotoPrisma\Http\Requests\ProductoFormRequest; 
use DB;


class ProductoController extends Controller
{


    public function __construct()
    {


    }

    /**
     * Display a listing of the resource.
     *     
     */
    public function index(Request $request)
    {

        if($request)
        {            
            $query=trim($request->get('searchText'));
            $productos=DB::table('producto')->where('Nombre','LIKE','%'.$query.'%')
            ->where('Estado','=','1')
            ->orderBy('idProducto','desc')
            ->paginate(11);
            return view('inventario.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
      
      return view("inventario.producto.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoFormRequest $request)
    {
        $producto=new Producto;
        $producto->Nombre=$request->get('Nombre');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->Precio=$request->get('Precio');
        $producto->Imagen=$request->get('Imagen');
        $producto->Existencias=$request->get('Existencias');
        $producto->Estado='1';
        $producto->save();

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
        
        return view("inventario/producto.show",["producto"=>Producto::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("inventario/producto.edit",["producto"=>Producto::findOrFail($id)]);
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
        
        $producto=Producto::findOrFail($id);
        $producto->Nombre=$request->get('Nombre');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->Precio=$request->get('Precio');
        $producto->Imagen=$request->get('Imagen');
        $producto->Existencias=$request->get('Existencias');


        $producto->update();
        

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
        $producto=Producto::findOrFail($id);
        $producto->Estado='0';
        $producto->update();

        return Redirect::to('inventario/producto');

    }
}
