<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AjaxCategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new Category;
        $category->fill($request->all())
            ->save();
        return response()->json([
            'data' => [
                'name' => $category->name,
                'id' => $category->id,
            ],
            'message' => trans('message.success.create')
        ], 200);
    }
}
