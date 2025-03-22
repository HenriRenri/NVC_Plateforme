<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with(['categories', 'images' => function ($query) {
            $query->where('is_default', true);
        }])->orderBy('id', 'desc')->paginate(10);

        return view('admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        //$boxes = Box::all();
        
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'box_id' => 'required|exists:boxes,id',
            'category_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Products::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'box_id' => $validated['box_id'],
            'category_id' => $validated['category_id'] ?? null,
            'is_active' => $request->has('is_active'),
        ]);

        if ($request->hasFile('images')) {
            $isFirstImage = true;
            
            foreach ($request->file('images') as $image) {
                $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('products', $filename, 'public');
                
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $path,
                    'image_type' => $image->getClientOriginalExtension(),
                    'image_size' => $image->getSize(),
                    'is_default' => $isFirstImage,
                ]);
                
                $isFirstImage = false;
            }
        }
        return redirect()->route('products')->with('success', 'Product has been created succesfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
