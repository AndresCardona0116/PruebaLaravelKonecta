<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use Illuminate\Support\Facades\Redirect;
use DB;

class rolController extends Controller
{
    //Controlador de los roles 
    
    public function index(Request $request)
    {
        //Lista de los registros roles
        
        If($request){
            $sql=trim($request->get('buscarTexto'));
            $roles=DB::table('roles')->where('Nombre', 'LIKE', '%'.$sql.'%')
            ->OrderBy('id', 'asc')
            ->Paginate(1);
            return view('roles.index', ['roles'=>$roles, "buscarTexto"=>$sql]);
            //return $roles;
        }
    }
}
