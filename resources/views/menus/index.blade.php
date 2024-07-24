@extends('layouts.masterblade')
@section('title', 'Menús')
@section('title-header', 'Menús')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Menús', 'active' => true]];
    @endphp
@endsection
@section('content')
    @include('alerts.alerts')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                {{--  --}}
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <div class="mt-sm-0 mt-2">
                                <a href="{{ Route('menus.create') }}" class="btn btn-outline-primary mr-2">
                                    <i class="fa fa-plus"></i>
                                    <span class="ml-2">Crear</span>
                                </a>
                                <button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Menu</th>
                                    <th>Tipo</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->name }}</td>
                                        <th>{{ $menu->menuType->name }}</th>
                                        <td class="text-right">
                                            <a href="{{ Route('menus.edit', $menu->id) }}"
                                                class="btn btn-primary btn-sm mb-1">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button type="submit" data-toggle="modal"
                                                data-target="#delete_{{ $menu->id }}"
                                                class="btn btn-danger btn-sm mb-1">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                        @include('components.confirm-delete', [
                                            'id' => $menu->id,
                                            'record' => $menu->name,
                                            'route' => 'menus/' . $menu->id,
                                        ])
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="2">No hay Menús</th>
                                    </tr>
                                @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
