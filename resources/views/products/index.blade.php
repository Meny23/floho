@extends('layouts.masterblade')
@section('title', 'Productos')
@section('title-header', 'Productos')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Productos', 'active' => true]];
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
                                <a href="{{ Route('products.create') }}" class="btn btn-outline-primary mr-2">
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
                                    <th>Producto</th>
                                    <th>Codigo</th>
                                    <th>Description</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td>
                                            <button class="btn btn-secondary" data-toggle="modal"
                                                data-target="#edit_{{ $product->id }}">
                                                <i class="fa fa-flag-checkered"></i>
                                            </button>
                                        </td>
                                        <th>{{ $product?->category?->name }}</th>
                                        <td>
                                            <img data-bs-toggle="tooltip" data-placement="top" title="Ver imagen"
                                                data-toggle="modal" data-target="#view_image_{{ $product->id }}"
                                                style="cursor: pointer;" width="50px" src="{{ asset($product->link) }}"
                                                alt="">
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ Route('products.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm mb-1">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button type="submit" data-toggle="modal"
                                                data-target="#delete_{{ $product->id }}"
                                                class="btn btn-danger btn-sm mb-1">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                        @include('components.confirm-delete', [
                                            'title' => '¿Desea eliminar el producto?',
                                            'id' => $product->id,
                                            'record' => $product->name,
                                            'route' => 'products/' . $product->id,
                                        ])
                                        @include('components.edit-description', [
                                            'id' => $product->id,
                                            'item' => $product,
                                            'route' => 'products/' . $product->id,
                                        ])
                                        @include('components.view-image', [
                                            'id' => $product->id,
                                            'title' => $product->name,
                                            'link' => $product->link,
                                            'modal_size' => 'modal-lg',
                                        ])
                                    </tr>
                                @empty
                                    <tr>
                                        <th class="text-center" colspan="5">No hay productos</th>
                                    </tr>
                                @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
