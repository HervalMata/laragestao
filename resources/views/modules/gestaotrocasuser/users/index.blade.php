@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Usuários</h3>
            {!! Button::success('Novo Usuário')->asLinkTo(route('gestaotrocasuser.users.create')) !!}
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
                    return Button::warning('Editar')->asLinkTo(route('gestaotrocasuser.users.edit', ['user' => $user->id]));
                })
                ->callback('Excluir', function ($field, $user){
                    $deleteForm = "delete-form-{$user->id}";
                    $form = Form::open(['route' => ['gestaotrocasuser.users.destroy', 'user' => $user->id],
                             'method' => 'DELETE', 'style' => 'display:none', 'id' => $deleteForm]).
                             Form::close();
                    $anchorDestroy =  Button::danger('Excluir')->asLinkTo(route('gestaotrocasuser.users.destroy', ['user' => $user->id]))
                            ->addAttributes([
                                'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                            ]);

                    $anchorDestroy = $user->id == \Auth::user()->id ? '<a href="#" class="btn btn-danger disabled" title="Não é possível excluir o próprio usuário!">Remover</a>' : $anchrDestroy;
                    return $anchorDestroy.$form;
                }) !!}
            {{ $users->links() }}
        </div>
    </div>
@endsection