@extends('layouts.masterblade')
@section('title', 'Crear Menu')
@section('title-header', 'Crear Menu')
@section('breadcrumb')
    @php
        $breadcrumbs = [
            ['name' => 'Menus', 'link' => 'menus', 'active' => false],
            ['name' => 'Crear Menu', 'link' => 'menus/create', 'active' => true],
        ];
    @endphp
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ Route('menus.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Menú</strong></label>
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
                                    <select name="menu_type_id" id="menu_type_id" class="form-control">
                                        @foreach ($menu_types as $menu_type)
                                            <option value="{{ $menu_type->id }}">{{ $menu_type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('menu_type_id')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Link</strong></label>
                                    <input class="form-control" type="text" name="link" id="link"
                                        value="{{ old('link') }}" required>
                                    @error('link')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Icono</strong></label>
                                    <input class="form-control" type="text" name="icon" id="icon"
                                        value="{{ old('icon') }}" required>
                                    @error('icon')
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
