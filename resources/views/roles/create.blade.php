@extends('layouts.masterblade')
@section('title', 'Crear Rol')
@section('title-header', 'Crear Rol')
@section('breadcrumb')
    @php
        $breadcrumbs = [
            ['name' => 'Roles', 'link' => 'roles', 'active' => false],
            ['name' => 'Crear Rol', 'link' => 'roles/create', 'active' => true],
        ];
    @endphp
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ Route('roles.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Rol</strong></label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Descripción</strong></label>
                                    <input class="form-control" type="text" name="description" id="description"
                                        value="{{ old('description') }}" required>
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
