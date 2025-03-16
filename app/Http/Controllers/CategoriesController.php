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
            'image' => '    mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $category = new Categories();
        $category->name = $request->name;
        $category->description = $request->description;
        $image = $request->fille('image');
        $file_extenstion = $request->fille('image')->extension();
        $fileName = Carbon::now()->timestamp.'.'.$file_extenstion;
        $this->categories_thumbails_image($image, $fileName);
        $category->image = $fileName;
        
        $category->save();
        
        return redirect()->route('category')->with('categories_success', 'The categoris has been created succesfully.');
    }

    public function categories_thumbails_image($image, $imageName)
    {
        $destionationPath = public_path('uploads/categories');
        $img = Image::read($image->path);
        $img->cover(124,124,"top");
        $image->resize(124,124,function($constraint){
            $constraint->aspectRation();
        })->save($destionationPath.'/'.$imageName);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
