<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // Display a listing of the resource.

    public function index()
    {
        $perPage = 20;
        $posts = Post::paginate($perPage);

        return view('admin.posts.index', compact('posts'));
    }

    // Show the form for creating a new resource.

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', [
            'categories'    => $categories,
            'tags'          => $tags,
        ]);
    }

    // Store a newly created resource in storage.

    public function store(Request $request)
    {
        {
            // validation
            $request->validate([
                'title'     => 'required|string|max:100',
                'slug'      => 'required|string|max:100|unique:posts',
                'category_id'  => 'required|integer|exists:categories,id',
                'tags'      => 'nullable|array',
                'tags.*'    => 'integer|exists:tags,id',
                'image'     => 'required_without:content|nullable|url',
                'content'   => 'required_without:image|nullable|string|max:5000',
                'excerpt'   => 'nullable|string|max:200',
            ]);

            $data = $request->all();
            dump($data);

            // salvataggio
            $post = Post::create($data);
            $post->tags()->sync($data['tags']);

            return redirect()->route('admin.posts.show', ['post' => $post->id]);
            // redirect
        }
    }

    // Display the specified resource.

    public function show(Post $post)
    {
        // if(!$post) abort(404);  //not needed with dependency injection
        return view('admin.posts.show', compact('post'));
    }

    // Show the form for editing the specified resource.

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // Update the specified resource in storage.

    public function update(Request $request, Post $post)
    {
        $formData = $request->all();
        //dd($request) --> see how many data are here!
        $post->update($formData);
        return redirect()->route('admin.posts.show' , ['post'=> $post]);
    }

    // Remove the specified resource from storage.

    public function destroy(Post $post)
    {
        //
    }
}
