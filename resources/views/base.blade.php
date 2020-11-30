<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">


<!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <!-- HOVER CSS-->
    <link rel="stylesheet" href="{{asset("css/hover-min.css")}}">



    <title>Scraping Web</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/loginForm.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>



@include("partials.nav")



    <main class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Scrap Store</h1>
                </div>
            </div>


            @include('partials.busquedaForm')

            @if(isset($data['filter']))

                @include("partials.filter",[ 'data '=> $data ])

            @endif


            @yield('main')
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script src="{{ asset('js/app.js')}}" type="text/js"></script>
    <script src="{{ asset('js/main.js')}}" ></script>
    <script src="{{ asset('js/filter.js')}}" ></script>
    <script src="{{ asset('js/modal.js')}}" ></script>
    <script src="{{ asset('js/rating.js')}}" ></script>
    <script src="{{ asset('js/login.js')}}" ></script>
    <script src="{{ asset('js/modalLogin.js')}}" ></script>
    <script src="{{ asset('js/favoritosHelper.js')}}" ></script>

    @yield('scripts')

@include('modal.modalLogin')
@include('modal.modalRegister')
</body>
</html>
