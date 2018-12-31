@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Unidades</h3>
            <a href="{{ route('units.create') }}" class="btn btn-success">Nova Unidade</a>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Setor</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($units as $unit)
                    <tr>
                        <td>{{ $unit->id }}</td>
                        <td>{{ $unit->name }}</td>
                        <td>{{ $unit->sector }}</td>
                        <td>{{ $unit->state }}</td>
                        <td>{{ $unit->city }}</td>
                        <td>
                            <ul>
                                <li>
                                    <a href="{{route('units.edit', ['$unit' => $unit->id])}}">Editar</a>
                                </li>
                                <li>
                                    <?php $deleteForm = "delete-form-{$loop->index}"; ?>
                                    <a href="{{route('units.destroy', ['$unit' => $unit->id])}}"
                                        onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit();">Excluir</a>
                                    {!! Form::open(
                                    ['route' => ['units.destroy', '$unit' => $unit->id],
                                     'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none']) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $units->links() }}
        </div>
    </div>
@endsection