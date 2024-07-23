@extends('layouts.masterblade')
@section('title', 'Menús')
@section('title-header', 'Menús')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Menús', 'active' => true]];
    @endphp
@endsection
@section('content')
    <table class="table table-striped responsive">
        <thead class="table-dark">
            <tr>
                <th>Menu</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <th colspan="2">No hay Menús</th>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
