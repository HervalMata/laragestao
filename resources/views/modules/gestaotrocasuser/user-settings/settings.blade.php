@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar meu perfil de usuário</h3>
            {{--@include('errors.errors.form')--}}
            {!! Form::open(['route' => 'gestaotrocasuser.user_settings.update', 'class' => 'form', 'method' => 'PUT']) !!}

            {!! Form::hidden('redirectTo', URL::previous()) !!}
            {!! Html::openFormGroup('password', $errors) !!}
                {!! Form::label('password', 'Senha', ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                {!! Form::error('password', $errors) !!}
            {!! Html::closeFormGroup() !!}

            {!! Html::openFormGroup('password_confirmation', $errors) !!}
                {!! Form::label('password_confirmation', 'Confirme sua senha', ['class' => 'control-label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            {!! Html::closeFormGroup() !!}

            {!! Html::openFormGroup() !!}
                {!! Button::success('Editar perfil')->submit() !!}
            {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection