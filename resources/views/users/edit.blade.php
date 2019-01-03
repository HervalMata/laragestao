@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar Usuário</h3>

            {{--@include('errors.errors.form')--}}
            {!! Form::model($user, ['route' => ['users.update', 'users' => $user->id],
                'class' => 'form', 'method' => 'PUT']) !!}
                @include('users._form')
                {!! Html::openFormGroup() !!}
                    {!! Button::success('Editar usuário')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection