<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Iluminate\Support\facades\Storage;
use DB;

class userController extends Controller
{
    //Controlador del usuario
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Lista de los registros usuarios
        
        If($request){
            $sql=trim($request->get('buscarTexto'));
            $users=DB::table('users')
            ->join('roles', 'users.idrol','=','roles.id')
            ->select('users.id', 'users.nombre', 'users.tipo_documento', 'users.num_documento', 'users.direccion', 'users.telefono', 'users.email', 'users.usuario', 'users.password', 'users.condicion', 'users.idrol', 'roles.nombre as rol')
            ->where('users.nombre', 'LIKE', '%'.$sql.'%')
            ->OrWhere('users.num_documento', 'LIKE'. '%'.$sql.'%')
            ->OrderBy('users.id', 'desc')
            ->Paginate(3);

            $roles=DB::table('roles')
            ->select('id', 'Nombre', 'Descripcion')
            ->where('Estado', '=', '1')->get();

            return view('usuarios.index', ['usuarios'=>$users, 'roles'=>$roles, "buscarTexto"=>$sql]);
            //return $users;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        //Insert de registros a la tabla clientes 
        
        $user = New User();
        $user->nombre = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->usuario = $request->usuario;
        $user->password = bcrypt( $request->password);
        $user->condicion = '1';
        $user->idrol = $request->id_rol; 
        $user->save();
        return Redirect::to("usuarios");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Editar registros de clientes
        
        $user= User::findOrFail($request->id_usuario);
        $user->nombre = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->usuario = $request->usuario;
        $user->password = bcrypt($request->password);
        $user->condicion = '1';
        $user->idrol = $request->id_rol;   
        $user->save();
        return Redirect::to("usuarios");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Cambiar el estado a un usuario
        $user= User::findOrFail($request->id_usuario);
         
         if($user->condicion=="1"){

                $user->condicion= '0';
                $user->save();
                return Redirect::to("usuarios");

           }else{

                $user->condicion= '1';
                $user->save();
                return Redirect::to("usuarios");

            }


    }

}
