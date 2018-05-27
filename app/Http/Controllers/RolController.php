<?php

namespace FotoPrisma\Http\Controllers;

use Illuminate\Http\Request;

use FotoPrisma\Http\Requests;
use FotoPrisma\Rol;
use Illuminate\Support\Facades\Redirect;
use FotoPrisma\Http\Requests\RolFormController;
use DB;

class RolController extends Controller
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
            $roles=DB::table('rol')->where('Nombre','LIKE','%'.$query.'%')
            ->orderBy('idRol','desc')
            ->paginate(5);

            return view('usuarios.rol.index',["roles"=>$roles,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuario.rol.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolFormRequest $request)
    {
       	$rol=new Rol;
       	$rol->Nombre=$request->get('Nombre');

       	$rol->save();


       	return Redirect::to('usuarios/rol');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
	     return view("usuarios.rol.show",["rol"=>Rol::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("usuarios.rol.edit",["rol"=>Rol::findOrFail($id)]);       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolFormRequest $request, $id)
    {
      
      $rol=Rol::findOrFail($id);
      $rol->Descripcion=$request->get('Nombre');

      $rol->update();

      return Redirect::to('usuarios/rol');        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      	 
    }
}
