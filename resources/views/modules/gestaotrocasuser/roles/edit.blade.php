@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar Role de Usuário</h3>

            {!! Form::model($role, ['route' => ['gestaotrocasuser.roles.update', 'role' => $role->id],
                'class' => 'form', 'method' => 'PUT']) !!}
                @include('modules.gestaotrocasuser.roles._form')
                {!! Html::openFormGroup() !!}
                    {!! Button::success('Editar role')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection