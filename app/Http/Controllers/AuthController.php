<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $r)
    {
        $v = $r->validate(['name' => 'required|string|max:100', 'email' => 'required|email|max:150|unique:users,email', 'phone' => 'required|string|max:30|unique:users,phone', 'gender' => 'required|in:male,female', 'password' => 'required|min:8|confirmed', 'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048']);
        $path = $r->hasFile('profile_photo') ? $r->file('profile_photo')->store('profiles', 'public') : null;
        $u = User::create([...$v, 'password' => $v['password'], 'profile_photo' => $path, 'role' => 'customer', 'status' => 'pending', 'is_active' => true]);
        Profile::create(['user_id' => $u->id]);
        Auth::login($u);
        return redirect()->route('dashboard')->with('success', 'Registration successful. Please complete your profile.');
    }
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $r)
    {
        $credentials = $r->validate(['email' => 'required|email', 'password' => 'required']);
        if (Auth::attempt($credentials, $r->boolean('remember'))) {
            $r->session()->regenerate();
            return Auth::user()->role === 'admin' ? redirect()->route('admin.dashboard') : redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Invalid email or password.'])->onlyInput('email');
    }
    public function logout(Request $r)
    {
        Auth::logout();
        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect()->route('home');
    }
}
