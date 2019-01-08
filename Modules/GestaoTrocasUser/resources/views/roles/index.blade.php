@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Roles de Usuários</h3>
            {!! Button::success('Nova Role')->asLinkTo(route('gestaotrocasuser.roles.create')) !!}
        </div>
        <br/>
        <div class="row">
            {!!
            Table::withContents(
                $roles->items()
                )->striped()->bordered()
                ->callback('Editar', function($field, $role){
                    return Button::warning('Editar')->asLinkTo(route('gestaotrocasuser.roles.edit', ['role' => $role->id]));
                })
                ->callback('Excluir', function ($field, $role){
                    $deleteForm = "delete-form-{$role->id}";
                    $form = Form::open(['route' => ['gestaotrocasuser.roles.destroy', 'role' => $role->id],
                             'method' => 'DELETE', 'style' => 'display:none', 'id' => $deleteForm]).
                             Form::close();
                    $anchorDestroy = Button::danger('Excluir')->asLinkTo(route('gestaotrocasuser.roles.destroy', ['role' => $role->id]))
                            ->addAttributes([
                                'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                            ]);

                    //$anchorDestroy = $user->id == \Auth::user()->id ? '<a href="#" class="btn btn-danger disabled" title="Não é possível excluir o próprio usuário!">Remover</a>' : $anchrDestroy;
                    return $anchorDestroy.$form;
                ->callback('Permissões', function ($field, $role) {
                    return Button::success('Permissões')->asLinkTo(route('gestaotrocasuser.roles.permissions.edit', ['role' => $role->id]));
                });
                }) !!}
            {{ $roles->links() }}
        </div>
    </div>
@endsection