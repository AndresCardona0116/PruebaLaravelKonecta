<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CrudPrueba Con laravel y vue.js">
    <meta name="author" content="AndresCardona">
    <meta name="keyword" content="CrudPrueba Con laravel y vue.js">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Inicio - CrudPrueba</title>
    <!-- Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.min.css" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav ml-auto">
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none">{{Auth::user()->usuario}} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    {{ csrf_field() }} 
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        <!--Menu-->
            @if(Auth::check())
            @if (Auth::user()->idrol == 1)
                @include('Componentes.SlideAdministrador')
            @elseif (Auth::user()->idrol == 2)
                @include('Componentes.SlideVendedor')
            @else

            @endif

        @endif

        <!-- Contenido Principal -->
            @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>

    

    <footer class="app-footer">
        <span><a href="">Plantilla CoreUi</a> &copy; 2020</span>
        <span class="ml-auto">Editado Y desarollado por... <a href="">Andres Cardona</a></span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="js/Chart.min.js"></script>
    <!-- GenesisUI main scripts -->
    <script src="js/template.js"></script>

    <script type="text/javascript">
        
        
        $('#modalEditar').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var nombre_Modal_Editar = button.data('nombre')
            var Tipo_Doumento_Modal_Editar = button.data('tipo_documento')
            var Num_Documento_Modal_Editar = button.data('num_documento')
            var Direccion_Modal_Editar = button.data('direccion')
            var Telefono_Modal_Editar = button.data('telefono')
            var Email_Modal_Editar = button.data('email')
            var Id_Cliente = button.data('id_cliente')
            var modal = $(this)

            //Llevar informacion al formulario segun las variables definidas
            modal.find('.modal-body #Nombre').val(nombre_Modal_Editar);
            modal.find('.modal-body #Tipo_Documento').val(Tipo_Doumento_Modal_Editar); 
            modal.find('.modal-body #Num_Documento').val(Num_Documento_Modal_Editar); 
            modal.find('.modal-body #Direccion').val(Direccion_Modal_Editar); 
            modal.find('.modal-body #Telefono').val(Telefono_Modal_Editar); 
            modal.find('.modal-body #Email').val(Email_Modal_Editar); 
            modal.find('.modal-body #id_cliente').val(Id_Cliente); 
        })

        $('#modalEditarUsuario').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var nombre_Modal_Editar = button.data('nombre')
            var Tipo_Doumento_Modal_Editar = button.data('tipo_documento')
            var Num_Documento_Modal_Editar = button.data('num_documento')
            var Direccion_Modal_Editar = button.data('direccion')
            var Telefono_Modal_Editar = button.data('telefono')
            var Email_Modal_Editar = button.data('email')
            var Usuario_Modal_Editar = button.data('usuario')
            var Password_Modal_Editar = button.data('password')
            var id_rol_modal_editar = button.data('id_rol')
            var Id_usuario = button.data('id_usuario')
            var modal = $(this)

            //Llevar informacion al formulario segun las variables definidas
            modal.find('.modal-body #Nombre').val(nombre_Modal_Editar);
            modal.find('.modal-body #tipo_documento').val(Tipo_Doumento_Modal_Editar); 
            modal.find('.modal-body #Num_Documento').val(Num_Documento_Modal_Editar); 
            modal.find('.modal-body #Direccion').val(Direccion_Modal_Editar); 
            modal.find('.modal-body #telefono').val(Telefono_Modal_Editar); 
            modal.find('.modal-body #email').val(Email_Modal_Editar); 
            modal.find('.modal-body #usuario').val(Usuario_Modal_Editar); 
            modal.find('.modal-body #password').val(Password_Modal_Editar); 
            modal.find('.modal-body #id_rol').val(id_rol_modal_editar);
            modal.find('.modal-body #id_usuario').val(Id_usuario); 
        })


        $('#modalEliminar').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var Id_Cliente = button.data('id_cliente')
            var modal = $(this)

            //Llevar informacion al formulario segun las variables definidas
            modal.find('.modal-body #id_cliente').val(Id_Cliente); 
        })

        $('#modalEliminarUsuarios').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var Id_usuario = button.data('id_usuario')
            var modal = $(this)

            //Llevar informacion al formulario segun las variables definidas
            modal.find('.modal-body #id_usuario').val(Id_usuario); 
        })




    </script>
</body>

</html>