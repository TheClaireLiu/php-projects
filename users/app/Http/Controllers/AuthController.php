<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8']
        ]);

        User::create($request->toArray());
        return response()->json(['User registered'], 201);

    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if(!Auth::attempt($validated))
        {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = User::where('email', $validated['email'])->first();

        $token = $user->createToken('api-token');

        return response()->json(['message' => 'Authenticated', 'token' =>$token]);
    }

    public function logout(Request $request)
    {
        // remove token from database
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Token revoked.']);
    }
}
