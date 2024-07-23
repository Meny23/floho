<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Spatie\RouteAttributes\Attributes\Resource;

#[Resource(resource: "categories", only: ['index'])]
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->result(data: Category::all());
    }
}
