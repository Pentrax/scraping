
@extends('base')

@section('main')
{{-- {{dd($data)}}--}}
    <div class="alert alert-info" role="alert">
        No se encontraron comentarios para este producto
    </div>

    <div class="row">
        <div class="col">
            <a href="" class="btn btn-info"> Volver </a>
        </div>
        <div class="col">
            <a href="#" class="card-link  btn  btn-outline-info " data-toggle="modal" data-id="{{$data["producto_id"]}}" data-titulo="#" data-toggle="tooltip" data-placement="top" title="Comenta sobre el producto" data-target="#comment"  target="_blank">
                Comentar
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/helper.js')}}" ></script>

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
    var categoria = "<?php echo $data['categoria'] ?>";

    switch (categoria){
        case "tecnologia":
            $("#tecno").prop("checked", true);
            break;
        case "indumentaria":
            $("#indumentaria").prop("checked", true);
            break;
        case "accesorios":
            $("#deportes").prop("checked", true);
            break;
        default:
            break;
    }
</script>
