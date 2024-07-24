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
                <button class="nav-link active" id="nav-assigned-menus-tab" data-toggle="tab" data-target="#nav-assigned-menus"
                    type="button" role="tab" aria-controls="nav-assigned-menus" aria-selected="true">Asignación de
                    menus</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-assigned-menus" role="tabpanel"
                aria-labelledby="nav-assigned-menus-tab">
                @include('settings.menu-assignments')
            </div>
        </div>
    </div>
@endsection
