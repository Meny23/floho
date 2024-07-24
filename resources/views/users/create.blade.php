@extends('layouts.masterblade')
@section('title', 'Crear Usuario')
@section('title-header', 'Crear Usuario')
@section('breadcrumb')
    @php
        $breadcrumbs = [
            ['name' => 'Usuarios', 'link' => 'users', 'active' => false],
            ['name' => 'Crear Usuario', 'link' => 'users/create', 'active' => true],
        ];
    @endphp
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ Route('users.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="device_name" value="web">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Nombre</strong></label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ old('name') }}" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Correo</strong></label>
                                    <input class="form-control" type="email" name="email" id="email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for=""><strong>Contraseña</strong></label>
                                    <input class="form-control" type="password" name="password" id="password" required>
                                    @if ($errors->has('password'))
                                        @foreach ($errors->get('password') as $message)
                                            <div>
                                                <span class="text-danger"><i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for=""><strong>Confirmar contraseña</strong></label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        id="password_confirmation" required>
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
