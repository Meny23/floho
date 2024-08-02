<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "category_id",
        "name",
        "code",
        "description",
        "image",
    ];

    protected $appends = [
        "link",
    ];

    protected $hidden = [
        "deleted_at"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? "storage/" . $this->image : null
        );
    }
}
