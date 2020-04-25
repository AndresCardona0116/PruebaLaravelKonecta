@Extends('principal')
@section('contenido')
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="icon-user-following"></i> Roles... 
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! Form::open(array('url'=>'roles', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
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
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($roles as $rs)
                                    <tr>
                                        <td>{{$rs->Nombre}}</td>
                                        <td>{{$rs->Descripcion}}</td>
                                    </tr>
                                @endForEach
                            </tbody>
                        </table>
                        {{$roles->render()}} <!--Paginar de los registros segun el controlador-->
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>

        </main>
@endsection