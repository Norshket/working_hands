<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    function register(Request $request): Response
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'name' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'email' => $credentials['email'],
            'name' => $credentials['name'],
            'password' => Hash::make($credentials['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'user' => $user,
        ]);
    }
}
