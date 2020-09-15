@extends('base')

@section('main')
    <div class="col-sm-12">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div>

    </div>
    <div class="row">

        @foreach($paginate->items() as $item)
            <div class="col">
                    <div class="card hvr-underline-from-center " id="{{$item->empresa}}" style="width: 18rem;height: 97%">
                        <div class="card-body">
                            @if($item->empresa == "Fravega")
                            <div style="width: 48%"> {!! $item->brand !!} </div>
                            @else
                                <div style="background-color: red;    width: 62%;
                                    border-radius: 12px;
                                    padding-left: 20px;
                                    margin-bottom: 15px;
                                ">
                                <img src="{{$item->brand}}" width="115" itemprop="image" >
                                </div>
                            @endif

                            <h5 class="card-title">{{$item->titulo}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-pill badge-success">${{$item->precio}}</span></h6>
                            <img src="{{$item->src}}" width="115" itemprop="image" >
                            <p class="card-text">{{$item->contenido}}</p>

                            <a href="{{$item->href}}" style="position: absolute;
width: 90%;
left: 0;
bottom: 0;
margin-bottom: 10px;
margin-left: 15px" class="card-link btn btn-primary" style="width: 100%" target="_blank">Ver</a>
                        </div>
                    </div>
                <br><br>
            </div>

        @endforeach

    </div>


    </div>


    <div class="d-flex justify-content-center">
        {!! $paginate->links() !!}
    </div>



@endsection
