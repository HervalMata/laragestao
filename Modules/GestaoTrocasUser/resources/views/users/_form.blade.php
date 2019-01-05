{!! Form::hidden('redirectTo', URL::previous()) !!}
{!! Html::openFormGroup('name', $errors) !!}
{!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
{!! Form::text('name', null, ['class' => 'form-control']) !!}
{!! Form::error('name', $errors) !!}
{!! Html::closeFormGroup() !!}
{!! Html::openFormGroup('email', $errors) !!}
{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
{!! Form::text('email', null, ['class' => 'form-control']) !!}
{!! Form::error('email', $errors) !!}
{!! Html::closeFormGroup() !!}
{!! Html::openFormGroup('unit_id', $errors) !!}
{!! Form::label('unit_id', 'Unidades') !!}
{!! Form::select('unit_id', $units, null, ['class' => 'form-control']) !!}
{!! Form::error('unit_id', $errors) !!}
{{--{!! Form::error('units.*', $errors) !!}--}}
{!! Html::closeFormGroup() !!}