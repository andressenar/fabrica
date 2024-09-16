<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$category=Category::all();
        $category = Category::included()->get();
        return response()->json($category);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255|unique:categories',

        ]);

        $category = Category::create($request->all());

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::included()->findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255' . $category->id,

        ]);

        $category->update($request->all());

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json($category);
    }
}
