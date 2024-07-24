<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use App\Models\UserMenu;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\{Resource, Post};

#[Resource("user-menus", only: ["index"])]
class UserMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $menus = Menu::whereNotIn("id", $user->userMenus->pluck("menu_id"))->get();

        return view("user_menus.index", [
            "user" => $user,
            "menus" => $menus
        ]);
    }

    #[Post("assign-menus/{user}", name: "user-menus.assig_menus")]
    public function assignMenus(User $user, Request $request)
    {
        $assigned_menus = json_decode($request->assigned_menus);

        if (empty($assigned_menus)) {
            return back()->with('alert-danger', 'Debe seleccionar un menu');
        }

        collect($assigned_menus)->map(fn ($menu) => $user->userMenus()->create([
            "menu_id" => $menu
        ]));

        return redirect('settings')->with("alert-success", "Menú(s) agregados con exito");
    }

    #[Post("remove-menus/{user}", name: "user-menus.remove_menus")]
    public function removeMenus(User $user, Request $request)
    {
        $non_assigned_menus = json_decode($request->non_assigned_menus);

        if (empty($non_assigned_menus)) {
            return back()->with("alert-danger", 'Debe seleecionar un menu');
        }

        $user->userMenus->whereIn("menu_id", $non_assigned_menus)->each(fn ($menu) => $menu->delete());

        return redirect('settings')->with("alert-danger", "Menú(s) removidos con exito");
    }
}
