<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\AuthUserResource;
use App\Models\User;
use denis660\Centrifugo\Centrifugo;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    function register(RegisterRequest $request,  Centrifugo $centrifugo): Response
    {
        $data = $request->validated();

        $user = User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        $centrifugeToken = $centrifugo->generateConnectionToken((string)$user->id, 0, [
            'name' => $user->name,
        ]);


        return response()->json([
            'access_token' => $token,
            'centrifuge_token' => $centrifugeToken,
            'user' => AuthUserResource::make($user->load(['roles', 'permissions'])),
        ]);
    }
}
