<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('pages.auth.login.index');
    }

    public function authenticate (Request $request) {
        $safe_data = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', Password::min(8)->mixedCase()->letters()]
        ]);

        if (Auth::attempt($safe_data)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('credentials-mismatch-event', 'Inserted email or password is incorrect!');
    }

    public function create(Request $request) {
        return view('pages.auth.registration.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $safe_data = $request->validate([
            'name' => ['bail', 'required', 'min:5'],
            'username' => ['bail', 'required', 'min:5'],
            'email' => ['bail', 'required', 'email:dns', 'unique:users'],
            'password' => ['bail', 'required', Password::min(8)->mixedCase()->letters()]
        ]);

        // dd($safe_data);
        $safe_data['password'] = Hash::make($safe_data['password']);
        User::create($safe_data);

        return redirect('/auth/login')->with('successfully-registered-event', 'Now please log into your account.');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
