{{--{{dd($data)}}--}}
<div class="row" style="padding-bottom: 25px">
    <div class="col" id="badge-filter">
    @foreach($data['filter'] as $filter)
        <span class="badge badge-info">{{$filter}} <a href="{{route("remove-filter",["search"=>$data['search'] , "empresa"=> $filter,"categoria" => $data['categoria']])}}" style="color: black">X</a></span>
    @endforeach
    </div>
</div>
