@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Unidades</h3>
            <s href="{{ route('units.create') }}" class="btn btn-success">Nova Unidade</s>
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
                            Ações
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $units->links() }}
        </div>
    </div>
@endsection