<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Scraping Web</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: lightblue;
        }
    </style>

    <style>
        /*body {*/
        /*    font-family: "Lato", sans-serif;*/
        /*}*/

        .sidenav {
            height: 100%;
            width: 160px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 190px; /* Same as the width of the sidenav */
            /*font-size: 28px; !* Increased text to enable scrolling *!*/
            padding: 100px 10px;
            width: auto;
        }

        .search-cont {
            margin-left: 160px; /* Same as the width of the sidenav */
            /*font-size: 28px; !* Increased text to enable scrolling *!*/
            padding: 0px 10px;
            width: auto;
            background-color: white;
            box-shadow: 2px 1px #888;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>

</head>
<body>
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">--}}
{{--    <a class="navbar-brand" href="{{route("home")}}">Home</a>--}}
{{--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}

{{--    <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--        <ul class="navbar-nav mr-auto">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Link</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    Dropdown--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                    <a class="dropdown-item" href="#">Action</a>--}}
{{--                    <a class="dropdown-item" href="#">Another action</a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
{{--            </li>--}}
{{--        </ul>--}}

{{--    </div>--}}
{{--</nav>--}}

<div class="sidenav">
    <a href="#about">About</a>
    <a href="#services">Services</a>
    <a href="#clients">Clients</a>
    <a href="#contact">Contact</a>
</div>
<div class=" row fixed-top search-cont">


    {!! Form::open(['route' => 'search','method' => 'put','class'=> 'form-inline mx-2 my-auto d-inline w-100']) !!}
    {!!  Form::token() !!}
    <div class="form-group  mb-2" style="padding-top: 15px">
        {!!  Form::text('search', $search,['class' => 'form-control','style' => 'width:80%','placeholder'=> 'encontra lo que buscas ...']); !!}
        {!!  Form::submit('Busca',['class'=> 'btn btn-outline-success my-2 my-sm-0',"style"=>'margin-left: 5px']) !!}
    </div>
    {!! Form::close() !!}
</div>
<div class="container main">

    @yield('main')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
