@extends('layouts.masterblade')
@section('title', 'Crear categoria')
@section('title-header', 'Crear categoria')
@section('breadcrumb')
    @php
        $breadcrumbs = [
            ['name' => 'Categorias', 'link' => 'categories', 'active' => false],
            ['name' => 'Crear categoria', 'active' => true],
        ];
    @endphp
@endsection
@section('content')
    @include('alerts.alerts')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ Route('categories.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Categoria</strong></label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
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
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label for=""><strong>Descripcion</strong></label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                    @error('description')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="">
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
