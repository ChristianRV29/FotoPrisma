<?php

namespace FotoPrisma\Http\Controllers;

use Illuminate\Http\Request;

use FotoPrisma\Http\Requests;
use FotoPrisma\Categoria;
use Illuminate\Support\Facades\Redirect;
use FotoPrisma\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{


     public function __construct()
    {

    }
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
            $categorias=DB::table('categoria')->where('Nombre','LIKE','%'.$query.'%')
            ->where('Estado','=','Activo')
            ->orderBy('idCategoria','desc')
            ->paginate(5);

            return view('inventario.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("inventario.categoria.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request)
    {
        $categoria= new Categoria;
        $categoria->Nombre=$request->get('Nombre');        
        $categoria->Estado='Activo';
        
        $categoria->save();
        
        return Redirect::to('inventario/categoria');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view("inventario.categoria.show",["categoria"=>Categoria::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view("inventario.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->Nombre=$request->get('Nombre');
        $categoria->Estado=$request->get('Estado');

        $categoria->update();

        return Redirect::to('inventario/categoria');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $categoria=Categoria::findOrFail($id);
        $categoria->Estado='Inactivo';
        $categoria->update();

        return Redirect::to('inventario/categoria');
    }
}
