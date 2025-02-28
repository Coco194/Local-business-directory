<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
            'role' => 'required|string|in:customer,service-provider,admin'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return response()->json($user, 201);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = $user->createToken('Personal Access Token')->plainTextToken;

            // Correct the cookie name
            $cookie = cookie('laravel_token', $token, 60, null, null, false, true);

            return response([
                'message' => 'success',
                'token' => $token,
                'user' => $user,
            ])->cookie($cookie);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function logOut(Request $request)
    {
        $user = auth()->user();
        $user->tokens()->delete();

        session()->invalidate();
        session()->regenerateToken();

        // Ensure the correct cookie name is cleared
        $cookie = cookie('laravel_token', '', -1);

        return response()->json(['message' => 'logout'])->cookie($cookie);
    }

}
