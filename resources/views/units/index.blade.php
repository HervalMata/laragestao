@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Unidades</h3>
            {!! Button::success('Nova Unidade')->asLinkTo(route('units.create')) !!}
        </div>
        <div class="row">
<!--            --><?php //dd($units); ?>
            {!!
            Table::withContents(
                $units->items()
                )->striped()->bordered()
                ->callback('Editar', function($field, $unit){
                    return Button::warning('Editar')->asLinkTo(route('units.edit', ['unit' => $unit->id]));
                })
                ->callback('Excluir', function ($field, $unit){
                    $deleteForm = "delete-form-{$unit->id}";
                    $form = Form::open(['route' => ['units.destroy', 'unit' => $unit->id],
                             'method' => 'DELETE', 'style' => 'display:none', 'id' => $deleteForm]).
                             Form::close();
                    return Button::danger('Excluir')->asLinkTo(route('units.destroy', ['unit' => $unit->id]))
                            ->addAttributes([
                                'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                            ]).$form;
                }) !!}
            {{ $units->links() }}
        </div>
    </div>
@endsection