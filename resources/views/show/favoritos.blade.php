@extends('base')

@section('main')

    {{--    {{ dd($data['valoracion']) }}--}}
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">
                <h1>Favoritos de {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Favorito</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['result'] as $item)
            <tr>
                <td>
                    <h5>{{$item->titulo}}</h5>
                    <img class="rounded-circle" src="{{$item->src}}" width="70">
                </td>
                <td>
                    <a href="{{$item->href}}"  class="card-link  btn  btn-outline-success" target="_blank" data-toggle="tooltip" data-placement="top" title="Ver el producto en la tienda">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                    <a href="#" id="deleteFavorito" class="card-link  btn  btn-outline-danger" data-toggle="tooltip" data-id="{{$item->id}}" data-user="{{Auth::user()->id}}" data-placement="top" title="Eliminar de favoritos">
                        <i class="far fa-trash-alt" ></i>
                    </a>
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">

                <div class="row">
                    <div class="col">
                        <a href="{{route("search",["search"=>$data['search'] ,"categoria" => $data['categoria']])}}" class="btn btn-info"> Volver </a>
                    </div>
                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
