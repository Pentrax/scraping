<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <!-- HOVER CSS-->
    <link rel="stylesheet" href="{{asset("css/hover-min.css")}}">



    <title>Scraping Web</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>


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
{{--            <div class="sidebar-header">--}}
{{--                <div class="user-pic">--}}
{{--                    <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"--}}
{{--                         alt="User picture">--}}
{{--                </div>--}}
{{--                <div class="user-info">--}}
{{--          <span class="user-name">Jhon--}}
{{--            <strong>Smith</strong>--}}
{{--          </span>--}}
{{--                    <span class="user-role">Administrator</span>--}}
{{--                    <span class="user-status">--}}
{{--            <i class="fa fa-circle"></i>--}}
{{--            <span>Online</span>--}}
{{--          </span>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- sidebar-header  -->
{{--            <div class="sidebar-search">--}}
{{--                <div>--}}
{{--                    <div class="input-group">--}}
{{--                        <input type="text" class="form-control search-menu" id="inpunt-search" placeholder="filtrar...">--}}
{{--                        <div class="input-group-append">--}}
{{--              <span class="input-group-text">--}}
{{--                <a href="#" id="search-filter-btn" class=" btn-xs"><i class="fa fa-search"  aria-hidden="true"></i></a>--}}
{{--              </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-search"  aria-hidden="true"></i>
                            <span>Filtros</span>
{{--                            <span class="badge badge-pill badge-warning">New</span>--}}
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="{{route("fravega/{$search}/fravega/")}}" id="fravega-filter">Fravega
{{--                                        <span class="badge badge-pill badge-success">Pro</span>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Grabarino</a>
                                </li>
                                <li>
                                    <a href="#">Dashboard 3</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>E-commerce</span>
                            <span class="badge badge-pill badge-danger">3</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Products

                                    </a>
                                </li>
                                <li>
                                    <a href="#">Orders</a>
                                </li>
                                <li>
                                    <a href="#">Credit cart</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="far fa-gem"></i>
                            <span>Components</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">General</a>
                                </li>
                                <li>
                                    <a href="#">Panels</a>
                                </li>
                                <li>
                                    <a href="#">Tables</a>
                                </li>
                                <li>
                                    <a href="#">Icons</a>
                                </li>
                                <li>
                                    <a href="#">Forms</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-chart-line"></i>
                            <span>Charts</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Pie chart</a>
                                </li>
                                <li>
                                    <a href="#">Line chart</a>
                                </li>
                                <li>
                                    <a href="#">Bar chart</a>
                                </li>
                                <li>
                                    <a href="#">Histogram</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-globe"></i>
                            <span>Maps</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Google maps</a>
                                </li>
                                <li>
                                    <a href="#">Open street map</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-menu">
                        <span>Extra</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Documentation</span>
                            <span class="badge badge-pill badge-primary">Beta</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>Examples</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification">3</span>
            </a>
            <a href="#">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
            </a>
            <a href="#">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>

{{--<div class=" row fixed-top search-cont">--}}


{{--    {!! Form::open(['route' => 'search','method' => 'put','class'=> 'form-inline mx-2 my-auto d-inline w-100']) !!}--}}
{{--    {!!  Form::token() !!}--}}
{{--    <div class="form-group  mb-2" style="padding-top: 15px">--}}
{{--        {!!  Form::text('search', $search,['class' => 'form-control','style' => 'width:80%','placeholder'=> 'encontra lo que buscas ...']); !!}--}}
{{--        {!!  Form::submit('Busca',['class'=> 'btn btn-outline-success my-2 my-sm-0',"style"=>'margin-left: 5px']) !!}--}}
{{--    </div>--}}
{{--    {!! Form::close() !!}--}}
{{--</div>--}}
    <main class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-md-12">
                {!! Form::open(['route' => 'search','method' => 'put','class'=> 'form-inline mx-2 my-auto d-inline w-100']) !!}
                {!!  Form::token() !!}
                <div class="form-group  mb-2" style="padding-top: 15px">
                    {!!  Form::text('search', $search,['class' => 'form-control','style' => 'width:80%','placeholder'=> 'encontra lo que buscas ...',"id"=> "text-search"]); !!}
                    {!!  Form::submit('Busca',['class'=> 'btn btn-outline-success my-2 my-sm-0',"style"=>'margin-left: 5px']) !!}
                </div>
                {!! Form::close() !!}
                </div>
            </div>
            @yield('main')
        </div>
    </main>
{{--<div class="container main">--}}

{{--    @yield('main')--}}
{{--</div>--}}
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script src="{{ asset('js/app.js')}}" type="text/js"></script>
<script src="{{ asset('js/main.js')}}" ></script>
<script src="{{ asset('js/filter.js')}}" ></script>


</body>
</html>
