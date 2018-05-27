<?php

namespace FotoPrisma\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use FotoPrisma\Http\Requests;
use FotoPrisma\Usuario;
use FotoPrisma\Http\Requests\UsuarioFormRequest;


use DB;

class ClienteController extends Controller
{
   	 /*public function __construct()
    {
        //$this->middleware('auth');
    }*/


	 public function index(Request $request)
    {

        if($request)
        {

            $query=trim($request->get('searchText'));
            $usuarios=DB::table('usuario as us')
            ->join('Rol as rol','us.idRol','=','rol.idRol')
            ->select('us.Documento','us.Tipo_Documento','rol.Nombre as Rol','us.Nombre','us.Ciudad','us.Correo','us.Clave','us.Telefono','us.Estado')
            ->where('us.Nombre','LIKE','%'.$query.'%')
            ->where('rol.Nombre','=','Cliente')
            ->where('us.Estado','<>','Eliminado')
            ->orwhere('us.Documento','LIKE','%'.$query.'%')
            ->where('rol.Nombre','=','Cliente')
            ->where('us.Estado','<>','Eliminado')
            ->orderBy('us.Documento','desc')
            ->paginate(8);


            return view('usuarios.cliente.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios=DB::table('rol')->get();
        return view("usuarios.cliente.create",["usuarios"=>$usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioFormRequest $request)
    {
        $usuario=new Usuario;
        
        $usuario->idRol='2';
        $usuario->Tipo_Documento=$request->get('Tipo_Documento');
        $usuario->Documento=$request->get('Documento');
        $usuario->Nombre=$request->get('Nombre');        
        $usuario->Ciudad=$request->get('Ciudad');
        $usuario->Telefono=$request->get('Telefono');
        $usuario->Correo=$request->get('Correo');
        $usuario->Clave=$request->get('Clave');

        $usuario->Estado='Activo';
        
        $usuario->save();


        return Redirect::to('usuarios/cliente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    	return view("usuarios.cliente.show",["usuario"=>Usuario::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    	return view("usuarios.cliente.edit",["usuario"=>Usuario::findOrFail($id)]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioFormRequest $request, $id)
    {
        
    	$usuario=Usuario::findOrFail($id);

        $usuarios->Tipo_Documento=$request->get('Tipo_Documento');    
    	$usuario->Documento=$request->get('Documento');
        $usuario->Nombre=$request->get('Nombre');        
        $usuario->Ciudad=$request->get('Ciudad');
        $usuario->Telefono=$request->get('Telefono');
        $usuario->Correo=$request->get('Correo');
        $usuario->Clave=$request->get('Clave');
        $usuario->Estado=$request->get('Estado');

        $usuario->update();

        return Redirect::to('usuarios/cliente');

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$usuario=Usuario::findOrFail($id);
     	$usuario->Estado='Inactivo';

     	$usuario->update();

     	return Redirect::to('usuarios.cliente');

    }

}
