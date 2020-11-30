{{--{{dd(empty($data['filter']))}}--}}
@if(!empty($data['filter']))
    <div class="row">
        <div class="col" style="padding-bottom: 15px;">
            <span class="badge badge-primary" style="font-size: medium">Filtros Aplicados</span>
        </div>
    </div>
@endif
<div class="row" style="padding-bottom: 25px">

    <div class="col" id="badge-filter">
        @foreach($data['filter'] as $filter)
            @if($filter !="")
                <span class="badge badge-info" style="font-size: medium">{{$filter}} <a href="{{route("remove-filter",["search"=>$data['search'] , "empresa"=> $filter,"categoria" => $data['categoria']])}}" style="color: black">X</a></span>
            @endif
        @endforeach
            @if($data['orden'] != "")
                @if($data['orden'] == "menor")
                <span class="badge badge-info" style="font-size: medium">Menor a Mayor <a href="{{route("remove-filter",["search"=>$data['search'] , "orden"=> $data['orden'],"categoria" => $data['categoria']])}}" style="color: black">X</a></span>
                @endif
                @if($data['orden'] == "mayor")
                    <span class="badge badge-info " style="font-size: medium">Mayor a Menor <a href="{{route("remove-filter",["search"=>$data['search'] , "orden"=> $data['orden'],"categoria" => $data['categoria']])}}" style="color: black">X</a></span>
                @endif
            @endif
    </div>
</div>
