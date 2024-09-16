<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //$category=Category::all();
        $post = Post::included()->get();
        return response()->json($post);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required|max:255',

        ]);

        $post = Post::create($request->all());

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::included()->findOrFail($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required|max:255' . $post->id,

        ]);

        $post->update($request->all());

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json($post);
    }
}
