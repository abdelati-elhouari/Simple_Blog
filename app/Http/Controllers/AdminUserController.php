<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user && $user->role !== 'admin') {
            return redirect()->route('index')->with('error', 'You do not have permission to access this resource.');
        }
        $users = User::all();
        return view('./Pages/Dashbord/Users', ['users' => $users]);
    }
    
    public function destroy(User $user)
    {
        $usera = Auth::user();
        if ($user && $usera->role !== 'admin') {
            return redirect()->route('index')->with('error', 'You do not have permission to access this resource.');
        }
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully.');
    }

    public function edit(User $user)
    {
        $usera = Auth::user();
        if ($user && $usera->role !== 'admin') {
            return redirect()->route('index')->with('error', 'You do not have permission to access this resource.');
        }
        return view('./Pages/Dashbord/edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users')->with('success', 'User updated successfully.');
    }
    public function changePassword(Request $request, User $user)
    {
    $request->validate([
        'password' => 'required|string',
        'npassword' => 'required|string|min:8|confirmed',
    ]);

    if (!Hash::check($request->password, $user->password)) {
        return redirect()->back()->with(['error' => 'The old password is incorrect.'])->withInput();
    }

    $user->update([
        'password' => Hash::make($request->npassword),
    ]);

    return redirect()->route('users')->with('success', 'Password changed successfully.');
    }
}
