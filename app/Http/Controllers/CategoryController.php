<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Categories retrieved successfully.',
            'data' => CategoryResource::collection(Category::all())
        ], 200);
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
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validate([
            'slug' => 'required|string|max:255|unique:categories,slug',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validatedData);

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => new CategoryResource($category)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if (!$category) {
            return response()->json(['message' => 'Category not found.'], 404);
        }
    
        return response()->json([
            'message' => 'Category retrieved successfully.',
            'data' => new CategoryResource($category)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validate([
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($validatedData);

        return response()->json([
            'message' => 'Category updated successfully.',
            'data' => new CategoryResource($category)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully.'], 200);
    }
}
