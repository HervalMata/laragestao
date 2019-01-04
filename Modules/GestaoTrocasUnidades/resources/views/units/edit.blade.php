@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar Unidade</h3>

            {{--@include('errors.errors.form')--}}
            {!! Form::model($unit, ['route' => ['units.update', 'units' => $unit->id],
                'class' => 'form', 'method' => 'PUT']) !!}
                @include('modules.gestaotrocasunidades.units._form')
                {!! Html::openFormGroup() !!}
                    {!! Button::success('Editar unidade')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection