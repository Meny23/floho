@extends('layouts.masterblade')
@section('title', 'Mi perfil')
@section('title-header', 'Mi perfil')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Mi perfil', 'active' => true]];
    @endphp
@endsection
@section('content')
    @include('alerts.alerts')
    <div class="row">

    </div>
@endsection
