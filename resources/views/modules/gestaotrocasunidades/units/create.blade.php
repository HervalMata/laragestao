@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova Unidade</h3>
            {{--@include('errors.errors.form')--}}
            {!! Form::open(['route' => 'units.store', 'class' => 'form']) !!}
                @include('modules.gestaotrocasunidades.units._form')
                {!! Html::openFormGroup() !!}
                    {!! Button::success('Criar unidade')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection