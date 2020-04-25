<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Redirect;
use DB;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Lista de los registros Clientes
        
        If($request){
            $sql=trim($request->get('buscarTexto'));
            $clientes=DB::table('clientes')->where('Nombre', 'LIKE', '%'.$sql.'%')
            ->OrderBy('id', 'desc')
            ->Paginate(3);
            return view('clientes.index', ['clientes'=>$clientes, "buscarTexto"=>$sql]);
            //return $clientes;
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
        
        $clientes = New Cliente();
        $clientes->Nombre= $request->Nombre;
        $clientes->Tipo_Documento= $request->Tipo_Documento;
        $clientes->Num_Documento= $request->Num_Documento;
        $clientes->Direccion= $request->Direccion;
        $clientes->Telefono= $request->Telefono;
        $clientes->Email= $request->Email;
        $clientes->Estado= '1';
        $clientes->save();
        return Redirect::to("clientes");
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
        
        $clientes = Cliente::findOrFail($request->id_cliente);
        $clientes->Nombre= $request->Nombre;
        $clientes->Tipo_Documento= $request->Tipo_Documento;
        $clientes->Num_Documento= $request->Num_Documento;
        $clientes->Direccion= $request->Direccion;
        $clientes->Telefono= $request->Telefono;
        $clientes->Email= $request->Email;
        $clientes->Estado= '1';
        $clientes->save();
        return Redirect::to("clientes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Cambiar el estado a un cliente
        $clientes = Cliente::findOrFail($request->id_cliente);
        if($clientes->Estado == '1'){
            $clientes->Estado= '0';
            $clientes->save();
            return Redirect::to("clientes");
        }else{
            $clientes->Estado = '1';
            $clientes->save();
            return Redirect::to("clientes");
        }


    }
}
