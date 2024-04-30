<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Storage;



class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userCount = User::count();       
        $postCount = Post::count();
        if ( $user->role !== 'admin') {
            return redirect()->route('posts');
        }
        
        return view('./Pages/Dashbord/dashbord', ['users' => $userCount,'posts'=> $postCount]);
    }
    public function profile()
    {
        $user = Auth::user();
        return view('./pages/Dashbord/profile', ['user' => $user]);
    }

    public function posts()
    {
        $user = Auth::user();
        $posts = $user->posts;
        return view('./pages/Dashbord/posts', ['posts' => $posts]);
    }

    // public function editProfile()
    // {
    //     $userId = Auth::id(); 
    //     $user = User::find($userId);
    //     return view('./Pages/Dashbord/Profile', ['user' => $user]);
    // }

    public function updateProfile(Request $request)
    {
        
        $userId = Auth::id(); 
        $user = User::find($userId);
        $user->update($request->only('name', 'email'));
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request)
    {
    $request->validate([
        'password' => 'required|string',
        'npassword' => 'required|string|min:8|confirmed',
    ]);
    $userId = Auth::id(); 
    $user = User::find($userId);
    if (!Hash::check($request->password, $user->password)) {
        return redirect()->back()->with(['error' => 'The old password is incorrect.'])->withInput();
    }

    $user->update([
        'password' => Hash::make($request->npassword),
    ]);

    return redirect()->route('profile')->with('success', 'Password changed successfully.');
}

    public function destroyProfile()
    {
        $userId = Auth::id(); 
        $user = User::find($userId);
        $user->delete();
        return redirect()->route('index')->with('success', 'Your account has been deleted.');
    }

    public function editPost(Post $post)
    {
        return view('./Pages/Dashbord/editpost', ['post' => $post]);
    }
 public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:6048', 
        ]);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts')->with('success', 'Post updated successfully.');
    }
    public function destroyPost(Post $post)
    {
        $post->delete();
        return redirect()->route('posts')->with('success', 'Post deleted successfully.');
    }
}
