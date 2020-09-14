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
{{--        <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">New contact</a>--}}
    </div>
    <div class="row">

        @foreach($paginate->items() as $item)
            <div class="col">
                    <div class="card" style="width: 18rem;height: 97%">
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
{{--        <table class="table table-hover" id="dtBasicExample">--}}
{{--            <tbody>--}}
{{--        @foreach($paginate->items() as $item)--}}
{{--            --}}


{{--            <tr>--}}
{{--                <td>--}}
{{--                    <div class="card w-100" style="margin-bottom: 15px;">--}}
{{--                        @if($item->empresa == "Fravega")--}}
{{--                            <h5 class="card-header">--}}
{{--                            <div style="width: 10%">--}}
{{--                                {!! $item->brand !!}--}}
{{--                            </div>{{$item->titulo}} <span class="badge badge-pill badge-success">${{$item->precio}}</span>--}}
{{--                            </div>--}}
{{--                            </h5>--}}
{{--                        @else--}}
{{--                        <h5 class="card-header div-garba">--}}
{{--                                <div style="background-color: red;    width: 15%;--}}
{{--    border-radius: 12px;--}}
{{--    padding-left: 20px;--}}
{{--    margin-bottom: 15px;--}}
{{--">--}}
{{--                                        <img src="{{$item->brand}}" width="115" itemprop="image" >--}}
{{--                                </div>{{$item->titulo}} <span class="badge badge-pill badge-success">${{$item->precio}}</span>--}}
{{--                        </h5>--}}
{{--                        @endif--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <img src="{{$item->src}}" width="115" itemprop="image" >--}}
{{--                                </div>--}}
{{--                                <div class="col-6">--}}
{{--                                    {{$item->contenido}}--}}
{{--                                </div>--}}
{{--                                <div class="col text-right">--}}
{{--                                    <a href="{{$item->href}}" class="btn btn-primary" style="width: 100%" target="_blank">Ver</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </td>--}}

{{--            </tr>--}}

{{--        @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

    </div>


    <div class="d-flex justify-content-center">
        {!! $paginate->links() !!}
    </div>



@endsection

