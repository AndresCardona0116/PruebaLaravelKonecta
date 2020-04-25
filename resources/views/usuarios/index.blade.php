@Extends('principal')
@section('contenido')
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-user"></i> Usuarios... 
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! Form::open(array('url'=>'usuarios', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
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
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($usuarios as $user)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-id_usuario="{{$user->id}}" data-nombre="{{$user->nombre}}" data-tipo_documento="{{$user->tipo_documento}}" data-num_documento="{{$user->num_documento}}" data-direccion="{{$user->direccion}}" data-telefono="{{$user->telefono}}" data-email="{{$user->email}}" data-id_rol="{{$user->idrol}}"  data-usuario="{{$user->usuario}}" data-toggle="modal" data-target="#modalEditarUsuario">
                                              <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            
                                            @if($user->condicion == "1")
                                                <button type="button" class="btn btn-danger btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#modalEliminarUsuarios"    >
                                                    <i class="icon-minus"></i>
                                                </button>
                                            @else 
                                                <button type="button" class="btn btn-success btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#modalEliminarUsuarios"    >
                                                    <i class="icon-check"></i>
                                                </button>
                                            @endIf 

                                            
                                        </td>
                                        <td>{{$user->nombre}}</td>
                                        <td>{{$user->num_documento}}</td>
                                        <td>{{$user->direccion}}</td>
                                        <td>{{$user->telefono}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->usuario}}</td>
                                        <td>{{$user->rol}}</td>
                                        
                                        <td>
                                            @if($user->condicion == "1")
                                                <span class="badge badge-success">ACTIVO</span>
                                            @else 
                                               <span class="badge badge-danger">INHABILITADO</span>
                                            @endIf 
                                        </td>
                                    </tr>
                                @endForEach
                            </tbody>
                        </table>
                        {{$usuarios ->render()}} <!--Paginar de los registros segun el controlador-->
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>

            <!--Inicio del modal agregar-->
            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('usuarios.store')}}" method="post" class="form-horizontal">
                               {{csrf_field()}}

                               @include('usuarios.form')
                            </form> 
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>

            <!--Inicio del modal Editar-->
            <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar usuarios</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('usuarios.update', 'test')}}" method="post" class="form-horizontal">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                
                                <input type="hidden" id="id_usuario" name="id_usuario" value="">

                               @include('usuarios.form')
                            </form> 
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>

            <!--Fin del modal-->
            <!-- Inicio del modal Camhiar Estado -->
            <div class="modal fade" id="modalEliminarUsuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
               <div class="modal-dialog modal-primary modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">cambiar estado del usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('usuarios.destroy', 'test')}}" method="post" class="form-horizontal">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                
                                <input type="hidden" id="id_usuario" name="id_usuario" value="">

                                
                                <p>Estas seguro de cambiar el estado del usuario?</p>
                       
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