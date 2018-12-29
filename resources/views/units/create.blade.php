@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova Unidade</h3>

            {{--@include('errors.errors.form')--}}
            {!! Form::open(['route' => 'units.store', 'class' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sector', 'Setor') !!}
                {!! Form::text('sector', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('state', 'Estado') !!}
                {!! Form::text('state', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city', 'Cidade') !!}
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Criar unidade', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection