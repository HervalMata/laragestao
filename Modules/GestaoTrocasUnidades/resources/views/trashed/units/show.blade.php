@extends('resources.views.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Unidade - {{$unit->name}}</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Nome</strong>
                </li>
                <li class="list-group-item">{{$unit->name}}</li>
                <li class="list-group-item">
                    <strong>Setor</strong>
                </li>
                <li class="list-group-item">{{$unit->sector}}</li>
                <li class="list-group-item">
                    <strong>Estado</strong>
                </li>
                <li class="list-group-item">{{$unit->state}}</li>
                <li class="list-group-item">
                    <strong>Cidade</strong>
                </li>
                <li class="list-group-item">{{$unit->city}}</li>
            </ul>
        </div>
    </div>