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

    <link href="{{ asset('css/loginForm.css') }}" rel="stylesheet" type="text/css" />
{{--    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />--}}
    <!-- HOVER CSS-->
{{--    <link rel="stylesheet" href="{{asset("css/hover-min.css")}}">--}}



    <title>Scraping Web</title>


</head>
    <body>

        <div id="formWrapper">

            <div id="form">
                <div class="logo">
                    <h1 class="text-center head">Inicia Sesion</h1>
                </div>
                {{ Form::open(array('url' => 'login')) }}
                <div class="form-item">
                    {{ Form::label('email', 'Email',['class'=> 'formLabel']) }}
                    {{ Form::text('email', "",array('placeholder' => 'email@xxx.com', 'class'=> 'form-style')) }}

                </div>
                <div class="form-item">
                    {{ Form::label('password', 'Password',['class'=> 'formLabel']) }}
                    {{ Form::password('password',['class'=> 'form-style']) }}

                    <p><a href="#" ><small>Forgot Password ?</small></a></p>
                </div>
                <div class="form-item">
                    <p class="pull-left"><a href="#"><small>Register</small></a></p>

                    {{ Form::submit('Iniciar',['class' => 'login pull-right']) }}
                    <div class="clear-fix"></div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </body>

</html>
