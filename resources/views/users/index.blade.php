@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Usuários</h3>
            {!! Button::success('Novo Usuário')->asLinkTo(route('users.create')) !!}
        </div>
        <br/>
        <div class="row">
            {!! Form::model(compact('search'), ['class' => 'form-inline', 'method' => 'GET']) !!}
                {!! Form::label('search', 'Pesquisar', ['class' => 'control-label']) !!}
                {!! Form::text('search', null, ['class' => 'form-control']) !!}
                {!! Button::success('Buscar')->submit() !!}
            {!! Form::close() !!}
        </div>
        <br/>
        <div class="row">
            {!!
            Table::withContents(
                $users->items()
                )->striped()->bordered()
                ->callback('Editar', function($field, $user){
                    return Button::warning('Editar')->asLinkTo(route('users.edit', ['user' => $user->id]));
                })
                ->callback('Excluir', function ($field, $user){
                    $deleteForm = "delete-form-{$user->id}";
                    $form = Form::open(['route' => ['users.destroy', 'user' => $user->id],
                             'method' => 'DELETE', 'style' => 'display:none', 'id' => $deleteForm]).
                             Form::close();
                    return Button::danger('Excluir')->asLinkTo(route('users.destroy', ['user' => $user->id]))
                            ->addAttributes([
                                'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                            ]).$form;
                }) !!}
            {{ $users->links() }}
        </div>
    </div>
@endsection