@extends('base')

@section('main')
    <div class="col-sm-12">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div class="row">
        <input type="hidden" id="select-categoria" name="cat" value="{{$data['categoria']}}">

        @foreach($data['result']->items() as $item)
            <div class="col">
                    <div class="card hvr-underline-from-center "  style="width: 18rem;height: 97%">
                        <div class="card-body">
                            @if($item->empresa == "Fravega")
                            <div style="width: 48%">
                                {!! $item->brand !!} <i class="fa fa-heart"  id="heart" style="

display: inline;
position: absolute;
right: 0;
padding-right: 10px;
background-color: transparent;
font-size: 20px;
color: gray;
"></i>
                            </div>

                            @else
                                <div id="{{$item->empresa}}">
                                <img src="{{$item->brand}}" width="115" itemprop="image" >
                                </div>
                            @endif

                            <h5 class="card-title">{{$item->titulo}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-pill badge-success">${{$item->precio}}</span></h6>
                            <img src="{{$item->src}}" width="115" itemprop="image" >
                            <p class="card-text descripcion-mb30">{{$item->contenido}}</p>
                            <div class="row contenedor-botones" >
                                <div class="col">
                                    <a href="{{$item->href}}"  class="card-link  btn  btn-outline-success" target="_blank" data-toggle="tooltip" data-placement="top" title="Ver el producto en la tienda">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="{{$item->href}}" class="card-link  btn  btn-outline-info " data-toggle="modal" data-id="{{$item->id}}" data-titulo="{{$item->titulo}}" data-toggle="tooltip" data-placement="top" title="Comenta sobre el producto" data-target="#comment"  target="_blank">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="{{route("comentarios",["search"=>$data['search'] , "id_product"=> $item->id,"categoria" => $data['categoria']])}}" class="card-link btn  btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Ver los cometarios" data-id="{{$item->id}}" data-titulo="{{$item->titulo}}" >
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <br><br>
            </div>

        @endforeach

    </div>
    </div>


    <div class="d-flex justify-content-center">
        {!! $data['result']->links() !!}
    </div>



@endsection

@include("modal.modal")



@section('scripts')

    <script src="{{ asset('js/helper.js')}}" ></script>

@endsection
