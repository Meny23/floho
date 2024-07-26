@extends('layouts.masterblade')
@section('title', 'Roles')
@section('title-header', 'Roles')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Roles', 'active' => true]];
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
                                {{-- Todos los usuarios --}}
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <div class="mt-sm-0 mt-2">
                                <a href="{{ Route('roles.create') }}" class="btn btn-outline-primary mr-2">
                                    <i class="fa fa-plus"></i>
                                    <span class="ml-2">Crear</span>
                                </a>
                                <button class="btn btn-outline-primary mr-2">
                                    <img src="img/excel.png" alt="">
                                    <span class="ml-2">Excel</span>
                                </button>
                                <button class="btn btn-outline-danger mr-2">
                                    <img src="img/pdf.png" alt="" height="18">
                                    <span class="ml-2">PDF</span>
                                </button>
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
                                    <th>Rol</th>
                                    <th>Descripción</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td class="text-right">
                                            <a href="{{ Route('roles.edit', $role->id) }}"
                                                class="btn btn-primary btn-sm mb-1">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button type="submit" data-toggle="modal" data-target="#delete_{{ $role->id }}"
                                                class="btn btn-danger btn-sm mb-1">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                        @include('components.confirm-delete', [
                                            'title' => 'Rol',
                                            'id' => $role->id,
                                            'record' => $role->name,
                                            'route' => 'roles/' . $role->id,
                                        ])
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="3">No hay Roles</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
