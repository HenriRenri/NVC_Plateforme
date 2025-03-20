<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Constraint\Constraint;
use Intervention\Image\Laravel\Facades\Image;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::orderBy('id', 'desc')->paginate(10);
        return view('admin.category.categories', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);
    
        $category = new Categories();
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_extension = $image->extension();
            $fileName = Carbon::now()->timestamp.'.'.$file_extension;
            $this->categories_thumbnails_image($image, $fileName);
            $category->image_path = $fileName;
        }

        $category->save();
        
        return redirect()->route('category')->with('categories_success', 'The categoris has been created succesfully.');
    }

    public function categories_thumbnails_image($image, $imageName)
    {
        $destinationPath = public_path('uploads/categories');
        
        // Créer le répertoire s'il n'existe pas
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        
        // Utiliser correctement Intervention Image
        $img = Image::read($image);
        $img->cover(124, 124);
        $img->save($destinationPath.'/'.$imageName);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Categories::find($id);
        return view('admin.category.categories_show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('admin.category.categories_edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);
    
        $category = Categories::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_extension = $image->extension();
            $fileName = Carbon::now()->timestamp.'.'.$file_extension;
            $this->categories_thumbnails_image($image, $fileName);
            $category->image_path = $fileName;
        }

        $category->save();
        
        return redirect()->route('category')->with('update_success', 'The categoris has been updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
