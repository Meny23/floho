@extends('layouts.masterblade')
@section('title', 'Categorias')
@section('title-header', 'Categorias')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Categorias', 'active' => true]];
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
                                <a href="{{ Route('categories.create') }}" class="btn btn-outline-primary mr-2">
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
                        <table id="tbl_categories" class="table custom-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Categoria</th>
                                    <th>Descripción</th>
                                    <th>Imagen</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <button class="btn btn-secondary" data-toggle="modal"
                                                data-target="#edit_{{ $category->id }}">
                                                <i class="fa fa-flag-checkered"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <img width="50px" src="{{ asset($category->link) }}" alt="">
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ Route('categories.edit', $category->id) }}"
                                                class="btn btn-primary btn-sm mb-1">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button type="submit" data-toggle="modal"
                                                data-target="#delete_{{ $category->id }}"
                                                class="btn btn-danger btn-sm mb-1">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                        @include('components.confirm-delete', [
                                            'id' => $category->id,
                                            'record' => $category->name,
                                            'route' => 'categories/' . $category->id,
                                        ])
                                        @include('components.edit-description', [
                                            'id' => $category->id,
                                            'item' => $category,
                                            'route' => 'categories/' . $category->id,
                                        ])
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="3">No hay categorias</th>
                                    </tr>
                                @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
