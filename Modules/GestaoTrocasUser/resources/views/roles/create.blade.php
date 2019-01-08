@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova role de usuário</h3>
            {{--@include('errors.errors.form')--}}
            {!! Form::open(['route' => 'gestaotrocasuser.roles.store', 'class' => 'form']) !!}
                @include('modules.gestaotrocasuser.roles._form')
                {!! Html::openFormGroup() !!}
                    {!! Button::success('Criar role')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection