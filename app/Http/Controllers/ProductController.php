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

        if ($request->has('description')) {
            $queryItems->where('description', 'like', '%' . $request->description . '%');
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

        return ProductResource::collection($queryItems->paginate(10));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
