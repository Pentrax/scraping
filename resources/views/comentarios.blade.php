@extends('base')

@section('main')

{{--    {{ dd($data['valoracion']) }}--}}
    <table class="table">
        <tr>
            <td>
                <p class="rate">Valoracion de los usuarios -
                    @for($x=1; $x <= $data['avg'];$x++)
                    <i class="fa fa-star" style="color: gold"></i>
                    @endfor
            </td>
        </tr>
    </table>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">
                <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                    <div class="profile-image">
                        <img class="rounded-circle" src="{{$data['src']}}" width="70">
                    </div>
{{--                    <div class="d-flex flex-column-reverse flex-grow-0 align-items-center votings ml-1"><i class="fa fa-sort-up fa-2x hit-voting"></i><span>127</span><i class="fa fa-sort-down fa-2x hit-voting"></i></div>--}}
                    <div class="d-flex flex-column ml-3">
                        <div class="d-flex flex-row post-title">
                            <h5>{{$data['titulo']}}</h5>
{{--                            <span class="ml-2">(Jesshead)</span>--}}
                        </div>
{{--                        <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="bdge mr-1">video</span><span class="mr-2 comments">13 comments&nbsp;</span><span class="mr-2 dot"></span><span>6 hours ago</span></div>--}}
                    </div>
                </div>
                @if($data['comment'])
                <div class="coment-bottom bg-white p-2 px-4">
{{--                    <div class="d-flex flex-row add-comment-section mt-4 mb-4"><img class="img-fluid img-responsive rounded-circle mr-2" src="https://i.imgur.com/qdiP4DB.jpg" width="38"><input type="text" class="form-control mr-3" placeholder="Add comment"><button class="btn btn-primary" type="button">Comment</button></div>--}}
{{--                    {{dd($data['result'])}}--}}
                    @foreach($data['result'] as $comment)
                        <div class="commented-section mt-2">
                            <div class="d-flex flex-row align-items-center commented-user">
                                <h5 class="mr-2">{{$comment->titulo}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2"> <i class="fa fa-star"  style="color: gold" aria-hidden="true"></i> {{$comment->valoracion}}</span>
                            </div>
                            <div class="comment-text-sm"><span>{{$comment->comentario}}</span></div>
{{--                            <div class="reply-section">--}}
{{--                                <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">10</span><span class="dot ml-2"></span>--}}
{{--                                    <h6 class="ml-2 mt-1">Reply</h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                         <hr/>
                    @endforeach
                </div>
                @else
                    @include('partials.sinComentarios')
                @endif
                <div class="row">
                    <div class="col">
                        <a href="{{route("search",["search"=>$data['search'] ,"categoria" => $data['categoria']])}}" class="btn btn-info"> Volver </a>
                    </div>
                    <div class="col">
                        <a href="#" class="card-link  btn  btn-outline-info " data-toggle="modal" data-id="{{$data["producto_id"]}}" data-titulo="{{$data['titulo']}}" data-toggle="tooltip" data-placement="top" title="Comenta sobre el producto" data-target="#comment"  target="_blank">
                            Comentar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@include("modal.modal")


