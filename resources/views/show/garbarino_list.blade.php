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

        <table class="table table-hover">
            <tbody>
        @foreach($paginate as $item)
            <tr>
                <td>
                    <div class="card w-100" style="margin-bottom: 15px;">
                        <h5 class="card-header div-garba"><div style="background-color: red;    width: 15%;
    border-radius: 12px;
    padding-left: 20px;
    margin-bottom: 15px;
"> <img src="{{$item["brand"]}}" width="115" itemprop="image" ></div>{{$item["title"]}}</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{$item["src"]}}" width="115" itemprop="image" >
                                </div>
                                <div class="col-6">
                                    {{$item['content']}}
                                </div>
                                <div class="col text-right">
                                    <a href="{{$item["href"]}}" class="btn btn-primary" style="width: 100%" target="_blank">Ver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>

        @endforeach
            </tbody>
        </table>

    </div>


    <div class="d-flex justify-content-center">
        {!! $paginate->links() !!}
    </div>



@endsection