<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\RouteAttributes\Attributes\{Resource, Get, Prefix};

#[Resource('users')]
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', ['users' => User::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create", ["roles" => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        return redirect('users')->with("alert-success", "Se agrego el usuario: " . $user->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("users.edit", ["user" => $user, "roles" => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect("users")->with("alert-success", "Se edito el usuario: " .  $user->user_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user_name = $user->user_name;
        $user->delete();

        return redirect('users')->with("alert-danger", "Se elimino el usuario: " . $user_name);
    }

    #[Get("my-profile", name: "users.my_profile")]
    public function myProfile()
    {
        return view("users.my-profile");
    }
}
