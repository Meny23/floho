<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "description",
        "image"
    ];

    protected $hidden = [
        "deleted_at"
    ];

    protected $appends = [
        "link"
    ];

    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? "storage/" . $this->image : null
        );
    }
}
