@extends('layouts.masterblade')
@section('title', 'Tipos de menu')
@section('title-header', 'Tipos de menú')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Tipos de menú', 'active' => true]];
    @endphp
@endsection
@section('content')
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($menu_types as $menu_type)
                <tr>
                    <td>{{ $menu_type->name }}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <th colspan="2">No hay tipos de menú</th>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
