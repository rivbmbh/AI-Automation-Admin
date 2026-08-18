<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SweetAlert2\Laravel\Swal;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.products.products-list');
    }
        
        /**
         * Show the form for creating a new resource.
        */
    public function create()
    {
        return view('pages.products.add-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);
            
        Product::create($validated);

        // Swal::fire([
        //     'title' => 'Success',
        //     'text' => 'Product created successfully.',
        //     'icon' => 'success',
        //     'toast' => true,
        //     'position' => 'top-end',
        //     'showConfirmButton' => false,
        //     'timer' => 3000,
        //     'timerProgressBar' => true,
        // ]);
        
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
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
