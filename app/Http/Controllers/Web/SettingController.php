<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Spatie\RouteAttributes\Attributes\Get;

class SettingController extends Controller
{
    #[Get("settings", name: "settings")]
    public function settings()
    {
        return view("settings.settings", [
            "users" => User::all(),
            "roles" => Role::all(),
        ]);
    }
}
