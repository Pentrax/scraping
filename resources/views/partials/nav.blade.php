<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="{{url("/")}}">Scraping</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            @if(Auth::check())
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" style="height: 6%" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                                 alt="User picture">
                        </div>
                        <div class="user-info">
                  <span class="user-name">
                      {{Auth::user()->name}}

                  </span>
{{--                            <span class="user-role">Administrator</span>--}}
                            <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                  </span>
                        </div>
                    </div>
                <div class="sidebar-menu">
                    <ul>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-wrench"  aria-hidden="true"></i>
                                <span>Opciones</span>
                                {{--                            <span class="badge badge-pill badge-warning">New</span>--}}
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{route('logout')}}">
                                           Salir
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('show-favorito',["search"=>$data['search'] ,"user_id"=> Auth::user()->id ,"categoria" => $data['categoria']])}}">
                                           Favoritos
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
        <!-- sidebar-header  -->
{{--                    <div class="sidebar-search">--}}
{{--                        <div>--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control search-menu" id="inpunt-search" placeholder="filtrar...">--}}
{{--                                <div class="input-group-append">--}}
{{--                      <span class="input-group-text">--}}
{{--                        <a href="#" id="search-filter-btn" class=" btn-xs"><i class="fa fa-search"  aria-hidden="true"></i></a>--}}
{{--                      </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
            @else
                <div class="sidebar-header">

                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>Usuario</span>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <div class="user-pic">
                                        <img class="img-responsive img-rounded"  style="height: 6%" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                                             alt="User picture">
                                    </div>
                                    {{--                            <span class="badge badge-pill badge-warning">New</span>--}}
                                </a>
                                <div class="sidebar-submenu" style="background-color: #30353E">
                                    <ul>
                                        <li>

                                        </li>
                                        <li>
                                            <a href="{{route('login')}}" data-toggle="modal"  data-toggle="tooltip" data-placement="top" title="Inicia Sesion" data-target="#loginModal" > <i class="fas fa-sign-in-alt" style="color: green"></i> </a>
                                        </li>
                                        <li style="padding-top: 4px;">
                                            <a href="#" data-toggle="modal" data-target="#registerModal" data-toggle="tooltip" data-placement="top" title="Registrate"><i class="fa fa-registered" aria-hidden="true"></i>
                                                 </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            @endif
        <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>Filtros</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-search"  aria-hidden="true"></i>
                            <span>Empresas</span>
                            {{--                            <span class="badge badge-pill badge-warning">New</span>--}}
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if(!empty($data['empresas']))
                                    @foreach($data['empresas'] as $empresa)
                                    <li>

                                        <a href=" {{route("filter",["search"=>$data['search'] , "empresa"=> $empresa->empresa ,"categoria" => $data['categoria']])}}">
                                            {{$empresa->empresa}}

                                            {{--                                        <span class="badge badge-pill badge-success">Pro</span>--}}
                                        </a>
                                    </li>
                                    @endforeach

                                @endif
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Precio</span>
{{--                            <span class="badge badge-pill badge-danger">3</span>--}}
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="{{route("filter",["search"=>$data['search'] , "orden"=> "menor","categoria" => $data['categoria']])}}">
                                        Menor a Mayor
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("filter",["search"=>$data['search'] , "orden"=> "mayor","categoria" => $data['categoria']])}}">Mayor a Menor</a>
                                </li>
                                <li>
                                    <label style="color: #f1f1f1" for=""> Desde // Hasta</label>
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-input" id="filter-price" type="text">
                                            <input class="form-input"  id="filter-price" type="text">
                                        </div>
                                    </div>
{{--                                    <a href="#">Credit cart</a>--}}
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-shopping-cart"></i>
                        <a href=#>Tendencias</a>
                    </li>
{{--                    <li class="sidebar-dropdown">--}}
{{--                        <a href="#">--}}
{{--                            <i class="far fa-gem"></i>--}}
{{--                            <span>Components</span>--}}
{{--                        </a>--}}
{{--                        <div class="sidebar-submenu">--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="#">General</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Panels</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Tables</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Icons</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Forms</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="sidebar-dropdown">--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-chart-line"></i>--}}
{{--                            <span>Charts</span>--}}
{{--                        </a>--}}
{{--                        <div class="sidebar-submenu">--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Pie chart</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Line chart</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Bar chart</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Histogram</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="sidebar-dropdown">--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-globe"></i>--}}
{{--                            <span>Maps</span>--}}
{{--                        </a>--}}
{{--                        <div class="sidebar-submenu">--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Google maps</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Open street map</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="header-menu">--}}
{{--                        <span>Extra</span>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-book"></i>--}}
{{--                            <span>Documentation</span>--}}
{{--                            <span class="badge badge-pill badge-primary">Beta</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-calendar"></i>--}}
{{--                            <span>Calendar</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-folder"></i>--}}
{{--                            <span>Examples</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        {{--        <div class="sidebar-footer">--}}
        {{--            <a href="#">--}}
        {{--                <i class="fa fa-bell"></i>--}}
        {{--                <span class="badge badge-pill badge-warning notification">3</span>--}}
        {{--            </a>--}}
        {{--            <a href="#">--}}
        {{--                <i class="fa fa-envelope"></i>--}}
        {{--                <span class="badge badge-pill badge-success notification">7</span>--}}
        {{--            </a>--}}
        {{--            <a href="#">--}}
        {{--                <i class="fa fa-cog"></i>--}}
        {{--                <span class="badge-sonar"></span>--}}
        {{--            </a>--}}
        {{--            <a href="#">--}}
        {{--                <i class="fa fa-power-off"></i>--}}
        {{--            </a>--}}
        {{--        </div>--}}
    </nav>
