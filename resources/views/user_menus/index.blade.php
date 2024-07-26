@extends('layouts.masterblade')
@section('title', 'Menús del usuario')
@section('title-header', 'Menús del usuario')
@section('breadcrumb')
    @php
        $breadcrumbs = [
            ['name' => 'Usuarios', 'link' => 'users', 'active' => false],
            ['name' => 'Menús del usuario', 'active' => true],
        ];
    @endphp
@endsection
@section('content')
    @include('alerts.alerts')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                Asignados
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <div class="mt-sm-0 mt-2">
                                <button {!! $user->userMenus->isEmpty() ? 'disabled' : '' !!} id="btn_remove_menus" class="btn btn-outline-danger mr-2">
                                    <i class="fa fa-plus"></i>
                                    <span class="ml-2">Remover</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Menú</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user->userMenus as $userMenu)
                                    <tr>
                                        <td>{{ $userMenu->menu->name }}</td>
                                        <td class="text-right">
                                            <input type="checkbox" name="non_assign_menus" id="non_assign_menus"
                                                class=form-control-sm" value="{{ $userMenu->menu->id }}">
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="2">No hay menus agregados</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                por asignar
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <div class="mt-sm-0 mt-2">
                                <button {!! $menus->isEmpty() ? 'disabled' : '' !!} id="btn_assign_menus" class="btn btn-outline-primary mr-2">
                                    <i class="fa fa-plus"></i>
                                    <span class="ml-2">Agregar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Menú</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->name }}</td>
                                        <td class="text-right">
                                            <input type="checkbox" name="assign_menus[]" id="assign_menus"
                                                class=form-control-sm" value="{{ $menu->id }}">
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="2">No hay menus por asignar</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <form id="frm_assign_menus" action="{{ Route('user-menus.assig_menus', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="assigned_menus" id="assigned_menus">
        </form>

        <form id="frm_remove_menus" action="{{ Route('user-menus.remove_menus', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="non_assigned_menus" id="non_assigned_menus">
        </form>
    </div>

    <script>
        document.querySelector("#btn_assign_menus").addEventListener("click", () => {
            const assigned_menus = []
            document.querySelectorAll("#assign_menus").forEach(menu => {
                if (menu.checked) {
                    assigned_menus.push(menu.value)
                }
            })

            document.querySelector("#assigned_menus").value = JSON.stringify(assigned_menus)
            document.querySelector("#frm_assign_menus").submit()
        })

        document.querySelector("#btn_remove_menus").addEventListener("click", () => {
            const non_assigned_menus = []
            document.querySelectorAll("#non_assign_menus").forEach(menu => {
                if (menu.checked) {
                    non_assigned_menus.push(menu.value)
                }
            })

            document.querySelector("#non_assigned_menus").value = JSON.stringify(non_assigned_menus)
            document.querySelector("#frm_remove_menus").submit()
        })
    </script>
@endsection
