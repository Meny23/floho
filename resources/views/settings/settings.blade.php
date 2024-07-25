@extends('layouts.masterblade')
@section('title', 'Ajustes')
@section('title-header', 'Ajustes')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Ajustes', 'active' => true]];
    @endphp
@endsection
@section('content')
    @include('alerts.alerts')
    <div class="container-fluid">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-users-tab" data-toggle="tab" data-target="#nav-users"
                    type="button" role="tab" aria-controls="nav-users" aria-selected="true">
                    Usuarios</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-users" role="tabpanel"
                aria-labelledby="nav-users-tab">
                @include('settings.users')
            </div>
        </div>
    </div>
@endsection
