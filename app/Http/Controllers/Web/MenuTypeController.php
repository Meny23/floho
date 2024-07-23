<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\MenuType;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Resource;

#[Resource('menu-types')]
class MenuTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu_types.index', ['menu_types' => MenuType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuType $menuType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuType $menuType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuType $menuType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuType $menuType)
    {
        //
    }
}
