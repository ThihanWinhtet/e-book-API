<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::paginate());
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function store(CategoryRequest $request)
    {
        return new CategoryResource(Category::create($request->all()));
    }

    public function destroy($id)
    {
        return Category::find($id)->delete();
    }

    public function update(Category $category, CategoryRequest $request)
    {
        return $category->update($request->all());
    }
}
