@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova Usuário</h3>
            {{--@include('errors.errors.form')--}}
            {!! Form::open(['route' => 'users.store', 'class' => 'form']) !!}
                @include('users._form')
                {!! Html::openFormGroup() !!}
                    {!! Button::success('Criar usuário')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection