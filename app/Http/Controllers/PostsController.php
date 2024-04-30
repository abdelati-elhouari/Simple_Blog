<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('./Pages/Dashbord/Newpost');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:6048',
        ]);
    
        $post = new Post;
        $post->user_id = auth()->id();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        } else {
            
            $defaultImagePath = 'images/sYhvmgCyGdFAdOFxlAbE8YNxo01NlClJ9WJBRrDJ.jpg';
            $post->image = $defaultImagePath;
        }
    

        $post->save();

        return redirect()->route('posts')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('./pages/ViewPost', compact('post'));
    }

    // public function edit($id)
    // {
    //     $post = Post::findOrFail($id);
    //     return view('posts.edit', compact('post'));
    // }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048', 
        ]);
    
        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }
    
        $post->save();
        return redirect()->route('posts')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts')->with('success', 'Post deleted successfully.');
    }

    public function posts()
    {
        $posts = Post::with('user')->get();
        return view('./Pages/Dashbord/AllPosts', compact('posts'));
    }
    public function destrotyByadmin($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('all.posts')->with('success', 'Post deleted successfully.');
    }

}