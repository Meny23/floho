<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Traits\HasActiveColumn;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasActiveColumn, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        "surname",
        "second_surname",
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [
        "user_name",
    ];

    public function userMenus()
    {
        return $this->hasMany(UserMenu::class);
    }

    public function assignedMenus()
    {
        return MenuType::with(['menus' => fn ($query) => $query->whereIn('id', $this->userMenus->pluck("menu_id"))])
            ->whereIn("id", $this->userMenus->map(fn ($user_menu) => $user_menu->menu->menu_type_id)->unique())
            ->get();
    }

    /**
     * provide a new user token
     */
    public function getToken(string $device_name):string 
    {
        return $this->createToken($device_name)->plainTextToken;
    }

    /**
     * check if password user is correct
     */
    public function checkPassword(string $password): bool
    {
        return Hash::check($password, $this->password);
    }

    /**
     * concat full name
     */
    protected function userName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name . " " . $this->surname . " " . $this->second_surname
        );
    }
}
