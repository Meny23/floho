<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "position",
        "link",
        "menu_type_id",
        "icon"
    ];

    protected $hidden = [
        "deleted_at"
    ];

    public function userMenus()
    {
        return $this->hasMany(UserMenu::class);
    }

    public function menuType()
    {
        return $this->belongsTo(MenuType::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucfirst($value)
        );
    }
}
