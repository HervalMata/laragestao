@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Unidades</h3>
            {!! Button::success('Nova Unidade')->asLinkTo(route('units.create')) !!}
        </div>
        <div class="row">
            {!!
                Table::withContents($units->items())->striped()
                    ->callback('Ações', function ($field, $unit) {
                        $linkEdit = route('units.edit', ['unit' => $unit->id]);
                        $linkDestroy = route('units.destroy', ['unit' => $unit->id]);
                        $deleteForm = "delete-form-{$unit->id}";
                        $form = Form::open(['route' => ['units.destroy', 'unity' => $unit->id],
                            'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none']).Form::close();
                            $anchorDestroy = Button::link('Excluir')->asLinkTo($linkDestroy)->addAttributes([
                            'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"]);
                        return "<ul class=\"list-inline\">".
                        "<li>".Button::link('Editar')->asLinkTo($linkEdit)."</li>".
                        "<li>|</li>".
                        "<li>".$anchorDestroy."</li>".
                        "</ul>".$form;
                    })
            !!}
            {{ $units->links() }}
        </div>
    </div>
@endsection