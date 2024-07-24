<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            Asignar menús al usuario
                        </div>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                        <div class="mt-sm-0 mt-2">
                            <button class="btn btn-outline-primary mr-2">
                                <img src="img/excel.png" alt="">
                                <span class="ml-2">Excel</span>
                            </button>
                            <button class="btn btn-outline-danger mr-2">
                                <img src="img/pdf.png" alt="" height="18">
                                <span class="ml-2">PDF</span>
                            </button>
                            <button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead class="thead-light">
                            <tr>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Menús</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->userMenus as $userMenu)
                                            <span class="badge badge-primary">{{ $userMenu->menu->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ Route('user-menus.index', ['user_id' => $user->id]) }}"
                                            class="btn btn-secondary btn-sm mb-1">
                                            <i class="fa fa-th-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="4">No hay usuarios</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
