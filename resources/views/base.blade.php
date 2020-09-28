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



@include("partials.nav")



    <main class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 col-offset-md-2">

                    <h1>Scraping</h1>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                {!! Form::open(['route' => 'search','method' => 'get','class'=> 'form-inline mx-2 my-auto d-inline w-100','id'=> 'search-form']) !!}
                {!!  Form::token() !!}
                <div class="form-group  mb-2" style="padding-top: 15px">
                    {!!  Form::text('search', $search,['class' => 'form-control','style' => 'width:80%','placeholder'=> 'encontra lo que buscas ...',"id"=> "text-search",'required']); !!}
                    {!!  Form::submit('Busca',['class'=> 'btn btn-outline-success my-2 my-sm-0 ',"style"=>'margin-left: 5px','id'=> 'search-btn']) !!}
                </div>
                <div class="form-group">
                    <span class="badge badge-primary">Selecciona una categoria</span>
                </div>

                    <div class="form-check-inline">

                        {!! Form::radio('radio','tecnologia',false,['class' => 'form-check-input','required']) !!}
                        {!! Form::label('checkbox', 'Técnologia',['class'=>'form-check-label']) !!}

                    </div>
                    <div class="form-check-inline">
                        {!! Form::radio('radio','indumentaria',false,['class' => 'form-check-input','required']) !!}
                        {!! Form::label('checkbox', 'Indumentaria',['class'=>'form-check-label']) !!}
                    </div>
                    <div class="form-check-inline">
                        {!! Form::radio('radio','accesorios',false,['class' => 'form-check-input','required']) !!}
                        {!! Form::label('checkbox', 'Accesorios',['class'=>'form-check-label']) !!}
                    </div>


                {!! Form::close() !!}
                </div>
            </div>
            <div id="spinner">

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
