@Extends('principal')
@section('contenido')
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Clientes</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Clientes... 
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! Form::open(array('url'=>'clientes', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
                                    <div class="input-group">
                                        <input type="text" id="texto" name="buscarTexto" class="form-control" placeholder="Texto a buscar" value="{{$buscarTexto}}">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                    </div>
                                {{Form::close()}}
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Documento</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($clientes as $clients)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-id_cliente="{{$clients->id}}" data-Nombre="{{$clients->Nombre}}" data-Tipo_Documento="{{$clients->Tipo_Documento}}" data-Num_Documento="{{$clients->Num_Documento}}" data-Direccion="{{$clients->Direccion}}" data-Telefono="{{$clients->Telefono}}" data-Email="{{$clients->Email}}" data-toggle="modal" data-target="#modalEditar">
                                              <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            
                                            @if($clients->Estado == "1")
                                                <button type="button" class="btn btn-danger btn-sm" data-id_cliente="{{$clients->id}}" data-toggle="modal" data-target="#modalEliminar"    >
                                                    <i class="icon-minus"></i>
                                                </button>
                                            @else 
                                                <button type="button" class="btn btn-success btn-sm" data-id_cliente="{{$clients->id}}" data-toggle="modal" data-target="#modalEliminar"    >
                                                    <i class="icon-check"></i>
                                                </button>
                                            @endIf 

                                            
                                        </td>
                                        <td>{{$clients->Nombre}}</td>
                                        <td>{{$clients->Num_Documento}}</td>
                                        <td>{{$clients->Telefono}}</td>
                                        <td>{{$clients->Email}}</td>
                                        <td>
                                            @if($clients->Estado == "1")
                                                <span class="badge badge-success">ACTIVO</span>
                                            @else 
                                               <span class="badge badge-danger">INHABILITADO</span>
                                            @endIf 
                                        </td>
                                    </tr>
                                @endForEach
                            </tbody>
                        </table>
                        {{$clientes->render()}} <!--Paginar de los registros segun el controlador-->
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>

            <!--Inicio del modal agregar-->
            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Clientes</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('clientes.store')}}" method="post" class="form-horizontal">
                               {{csrf_field()}}

                               @include('clientes.form')
                            </form> 
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>

            <!--Inicio del modal Editar-->
            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Clientes</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('clientes.update', 'test')}}" method="post" class="form-horizontal">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                
                                <input type="hidden" id="id_cliente" name="id_cliente" value="">

                               @include('clientes.form')
                            </form> 
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>

            <!--Fin del modal-->
            <!-- Inicio del modal Camhiar Estado -->
            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
               <div class="modal-dialog modal-primary modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">cambiar estado Cliente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('clientes.destroy', 'test')}}" method="post" class="form-horizontal">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                
                                <input type="hidden" id="id_cliente" name="id_cliente" value="">

                                
                                <p>Estas seguro de cambiar el estado del cliente?</p>
                       
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-danger">Cambiar</button>
                                </div>

                            </form> 
                        </div>
                        
                    </div>
                    
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- Fin del modal Eliminar -->
        </main>
@endsection