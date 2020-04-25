        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">
                        Opciones
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Modulo</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('clientes')}}" onclick="event.preventDefault(); document.getElementById('clientes-form').submit();"><i class="fa fa-list"></i> Clientes</a>
                            
                                <form id="clientes-form" action="{{url('clientes')}}" method="GET" style="display: none;">
                                    {{csrf_field()}} 
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Acceso</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('usuarios')}}" onclick="event.preventDefault(); document.getElementById('usuarios-form').submit();"><i class="fa fa-user"></i> Usuarios</a>

                                <form id="usuarios-form" action="{{url('usuarios')}}" method="GET" style="display: none;">
                                    {{csrf_field()}} 
                                </form>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('roles')}}" onclick="event.preventDefault(); document.getElementById('roles-form').submit();"><i class="icon-user-following"></i> Roles</a>

                                <form id="roles-form" action="{{url('roles')}}" method="GET" style="display: none;">
                                    {{csrf_field()}} 
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>