@extends('layouts.masterblade')
@section('title', 'Crear producto')
@section('title-header', 'Crear producto')
@section('breadcrumb')
    @php
        $breadcrumbs = [
            ['name' => 'Productos', 'link' => 'products', 'active' => false],
            ['name' => 'Crear Producto', 'link' => 'products/create', 'active' => true],
        ];
    @endphp
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ Route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Producto</strong></label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Tipo</strong></label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Imagen</strong></label>
                                    <input type="file" name="image" id="image">
                                    @error('image')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label for=""><strong>Descripcion</strong></label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-success">
                                        <i class="fa fa-save"></i> Crear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
