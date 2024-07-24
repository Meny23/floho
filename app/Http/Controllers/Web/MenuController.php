<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Resource;

#[Resource('menus')]
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("menus.index", ["menus" => Menu::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("menus.create", ["menu_types" => MenuType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $menu = Menu::create($request->validated());

        return redirect('menus')->with("alert-success", "Se agrego el menu: " . $menu->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return $menu;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return $menu;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $name = $menu->name;
        
        $menu->userMenus()->delete();
        $menu->delete();
        return redirect('menus')->with("alert-danger", "El menu: " . $name . ", fue eliminado");
    }
}
