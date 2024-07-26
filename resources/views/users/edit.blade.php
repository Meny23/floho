@extends('layouts.masterblade')
@section('title', 'Editar Usuario')
@section('title-header', 'Editar Usuario')
@section('breadcrumb')
    @php
        $breadcrumbs = [
            ['name' => 'Usuarios', 'link' => 'users', 'active' => false],
            ['name' => 'Editar Usuario', 'active' => true],
        ];
    @endphp
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ Route('users.update', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="device_name" value="web">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Nombre</strong></label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ $user->name }}" required>
                                    @error('name')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3">
                                    <label for=""><strong>Apellido</strong></label>
                                    <input class="form-control" type="text" name="surname" id="surname"
                                        value="{{ $user->surname }}" required>
                                    @error('surname')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3">
                                    <label for=""><strong>Apellido Materno</strong></label>
                                    <input class="form-control" type="text" name="second_surname" id="second_surname"
                                        value="{{ $user->second_surname }}" required>
                                    @error('second_surname')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Rol</strong></label>
                                    <select class="form-control" name="role_id" id="role_id">
                                        @foreach ($roles as $role)
                                            <option {!! $role->id == $user->role_id ? 'selected' : '' !!} value="{{ $role->id }}">{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Correo</strong></label>
                                    <input class="form-control" type="email" name="email" id="email"
                                        value="{{ $user->email }}" required>
                                    @error('email')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-success">
                                        <i class="fa fa-save"></i> Editar
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
