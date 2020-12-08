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
        <div class="col-sm-12 text-center">
            <div class="alert alert-info">
                No se encontraron resultados
            </div>
        </div>
        <input type="hidden" id="select-categoria" name="cat" value="{{$data['categoria']}}">




    </div>


    <div class="d-flex justify-content-center">
        {!! $data['result']->links() !!}
    </div>



@endsection

@include("modal.modal")



@section('scripts')

    <script src="{{ asset('js/helper.js')}}" ></script>

@endsection
