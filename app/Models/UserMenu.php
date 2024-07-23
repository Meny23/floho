<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMenu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "menu_id"
    ];

    protected $hidden = [
        "deleted_at"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
