@extends('layouts.masterblade')
@section('title', 'Usuarios')
@section('title-header', 'Usuarios')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Usuarios', 'active' => true]];
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
                                <a href="{{ Route('users.create') }}" class="btn btn-outline-primary mr-2">
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
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-right">
                                            <a href="{{ Route('users.edit', $user->id) }}"
                                                class="btn btn-primary btn-sm mb-1">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button type="submit" data-toggle="modal" data-target="#delete_{{ $user->id }}"
                                                class="btn btn-danger btn-sm mb-1">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                        @include('components.confirm-delete', [
                                            'title' => 'Usuario',
                                            'id' => $user->id,
                                            'record' => $user->user_name,
                                            'route' => 'users/' . $user->id,
                                        ])
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="2">No hay usuarios</th>
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
