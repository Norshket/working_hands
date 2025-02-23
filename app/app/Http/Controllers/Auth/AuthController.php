<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Resources\Auth\AuthUserResource;
use denis660\Centrifugo\Centrifugo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function __construct(private Centrifugo $centrifugo)
    {
    }

    function login(AuthRequest $request): Response
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        $centrifugeToken = $this->centrifugo->generateConnectionToken((string)$user->id, 0, [
            'name' => $user->name,
        ]);

        return response()->json([
            'access_token' => $token,
            'centrifuge_token' => $centrifugeToken,
            'user' => AuthUserResource::make($user->load(['roles', 'permissions'])),
        ]);
    }

    public function logout(Request $request): Response
    {
        $this->centrifugo->disconnect($request->user()->id);
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
