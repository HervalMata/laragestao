@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Lixeira de Unidades</h3>
        </div>
        <br/>
        <div class="row">
            {!! Form::model(compact('search'), ['class' => 'form-inline', 'method' => 'GET', 'style' => 'margin-bottom: 30px']) !!}
                {!! Form::label('search', 'Pesquisar', ['class' => 'control-label', 'autofocus']) !!}
                {!! Form::text('search', null, ['class' => 'form-control']) !!}
                {!! Button::success('Buscar')->submit() !!}
            {!! Form::close() !!}
        </div>
        <br/>
        <div class="row">
            @if($units->count() > 0)
                {!!
                Table::withContents(
                    $units->items()
                    )->striped()->bordered()
                    ->callback('Ações', function ($field, $unit){
                        $linkView = route('trashed.units.show', ['unit' => $unit->id]);
                        $linkDestroy = route('units.destroy', ['unit' => $unit->id]);
                        $restoreForm = "restore-form-{$unit->id}";
                        $form = Form::open(['route' => ['trashed.units.update', 'unit' => $unit->id],
                             'method' => 'PUT', 'style' => 'display:none', 'id' => $restoreForm],
                             Form::hidden('redirect_to', URL::previous())).
                             Form::close();
                        $anchorRestore = Button::link(Icon::create('repeat').'Restaurar')->asLinkTo($linkDestroy)
                            ->addAttributes([
                                'onclick' => "event.preventDefault();document.getElementById(\"{$index}\").submit()"
                            ]);
                        return "<ul class=\"list-inline\">".
                            "<li>".Button::link(Icon::create('eye-open').'Visualizar')->asLInkTo($linkView)."</li>".
                            "<li>|</li>".
                            "<li>".$anchorRestore."</li>"."</ul>".$form;
                }) !!}
            @else
                <div class="col-md-12 text-center">
                    <div class="well well-lg">
                        <p><strong>Lixeira Vazia</strong></p>
                    </div>
                </div>
            @endif
            {{ $units->links() }}
        </div>
    </div>
@endsection