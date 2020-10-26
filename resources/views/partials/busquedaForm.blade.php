

<div class="row">
    <div class="form-group col-md-12">

        {!! Form::open(['route' => 'search','method' => 'get','class'=> 'form-inline mx-2 my-auto d-inline w-100','id'=> 'search-form']) !!}
        {!!  Form::token() !!}
        <div class="form-group  mb-2" style="padding-top: 15px">

            {!!  Form::text('search', $data['search'],['class' => 'form-control','style' => 'width:80%','placeholder'=> 'encontra lo que buscas ...',"id"=> "text-search",'required']); !!}
            {!!  Form::submit('Busca',['class'=> 'btn btn-outline-success my-2 my-sm-0 ',"style"=>'margin-left: 5px','id'=> 'search-btn']) !!}
        </div>
        <div style="
                padding-top: 12px;
">

            <div class="form-group" style="padding-bottom: 12px">
                <span class="badge badge-primary" style="font-size: initial">Selecciona una categoria</span>
            </div>

            <div class="form-check-inline">

                {!! Form::radio('radio','tecnologia',($data['categoria'] == 'tecnologia')?true:false,['class' => 'form-check-input','required', 'id' => 'tecno']) !!}
                {!! Form::label('checkbox', 'Técnologia',['class'=>'form-check-label']) !!}

            </div>
            <div class="form-check-inline">
                {!! Form::radio('radio','indumentaria',($data['categoria'] == 'indumentaria')?true:false,['class' => 'form-check-input','required','id' => 'indumentaria']) !!}
                {!! Form::label('checkbox', 'Indumentaria',['class'=>'form-check-label']) !!}
            </div>
            <div class="form-check-inline">
                {!! Form::radio('radio','deportes',($data['categoria'] == 'deportes')?true:false,['class' => 'form-check-input','required','id' => 'deportes']) !!}
                {!! Form::label('checkbox', 'Deportes',['class'=>'form-check-label']) !!}
            </div>

        </div>


        {!! Form::close() !!}
    </div>

</div>


