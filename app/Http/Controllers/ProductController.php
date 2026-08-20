<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('pages.products.products-list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoriesDummy = [
            'Elektronik',
            'Fashion',
            'Skincare',
            'Toys',
            'Household'
        ];

        return view('pages.products.add-product', compact('categoriesDummy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Product::create($request->validated());
            });

            return redirect()
                ->route('products.index')
                ->with('success', 'Product created successfully.');
        } catch (Throwable $e) {
            Log::error('Failed to create product: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to create product. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // return view('pages.products.show-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categoriesDummy = [
            'Elektronik',
            'Fashion',
            'Skincare',
            'Toys',
            'Household'
        ];

        return view('pages.products.edit-product', compact('product', 'categoriesDummy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            DB::transaction(function () use ($request, $product) {
                $product->update($request->validated());
            });

            return redirect()
                ->route('products.index')
                ->with('success', 'Product updated successfully.');
        } catch (Throwable $e) {
            Log::error("Failed to update product {$product->id}: " . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to update product. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                $product->delete();
            });

            return redirect()
                ->route('products.index')
                ->with('success', 'Product deleted successfully.');
        } catch (Throwable $e) {
            Log::error("Failed to delete product {$product->id}: " . $e->getMessage());

            return redirect()
                ->route('products.index')
                ->with('error', 'Failed to delete product. Please try again.');
        }
    }
}