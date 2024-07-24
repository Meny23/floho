@extends('layouts.masterblade')
@section('title', 'Categorias')
@section('title-header', 'Categorias')
@section('breadcrumb')
    @php
        $breadcrumbs = [['name' => 'Categorias', 'active' => true]];
    @endphp
@endsection
@section('content')
    @dump($categories)
@endsection
