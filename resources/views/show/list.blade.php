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
                                    <a href="{{$item->href}}"  class="card-link btn  btn-outline-primary" style="width: 100%" target="_blank">Ver</a>
                                </div>
                                <div class="col">
                                    <a href="{{$item->href}}" class="card-link btn  btn-outline-info" data-toggle="modal" data-id="{{$item->id}}" data-titulo="{{$item->titulo}}" data-target="#comment"  style="width: 100%" target="_blank">Comentar</a>
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
