@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova Unidade</h3>
            {{--@include('errors.errors.form')--}}
            {!! Form::open(['route' => 'units.store', 'class' => 'form']) !!}
                {!! Html::openFormGroup('name', $errors) !!}
                    {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! Form::error('name', $errors) !!}
                {!! Html::closeFormGroup() !!}
                    {!! Html::openFormGroup('sector', $errors) !!}
                    {!! Form::label('sector', 'Setor', ['class' => 'control-label']) !!}
                    {!! Form::text('sector', null, ['class' => 'form-control']) !!}
                    {!! Form::error('sector', $errors) !!}
                {!! Html::closeFormGroup() !!}
                {!! Html::openFormGroup('state', $errors) !!}
                    {!! Form::label('state', 'Estado', ['class' => 'control-label']) !!}
                    {!! Form::text('state', null, ['class' => 'form-control']) !!}
                    {!! Form::error('state', $errors) !!}
                {!! Html::closeFormGroup() !!}
                {!! Html::openFormGroup('city', $errors) !!}
                    {!! Form::label('city', 'Cidade', ['class' => 'control-label']) !!}
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    {!! Form::error('city', $errors) !!}
                {!! Html::closeFormGroup() !!}
                {!! Html::openFormGroup() !!}
                    {!! Form::submit('Criar unidade', ['class' => 'btn btn-success']) !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection