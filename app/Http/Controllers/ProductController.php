<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryItems = Product::query();

        if ($request->has('name')) {
            $queryItems->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('categoryId')) {
            $queryItems->where('category_id', '=', $request->categoryId);
        }

        if ($request->has('min_price')) {
            $queryItems->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $queryItems->where('price', '<=', $request->max_price);
        }

        if ($request->has('min_rating')) {
            $queryItems->where('rating', '>=', $request->min_rating);
        }
        if ($request->has('max_rating')) {
            $queryItems->where('rating', '<=', $request->max_rating);
        }

        return response()->json(
            [
                'message' => 'Products retrieved successfully.',
                'data' => ProductResource::collection($queryItems->paginate(10))
            ],
            200
        );
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
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        $product = Product::create($validatedData);

        return response()->json(
            [
                'message' => 'Product created successfully.',
                'data' => new ProductResource($product)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        return response()->json(
            [
                'message' => 'Product retrieved successfully.',
                'data' => new ProductResource($product)
            ],
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        $product->update($validatedData);

        return response()->json(
            [
                'message' => 'Product updated successfully.',
                'data' => new ProductResource($product)
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.'], 200);
    }
}
