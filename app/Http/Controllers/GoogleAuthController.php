<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()  // This matches your route
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $token = $request->input('token');

        // Verify Google token
        $googleResponse = Http::get('https://oauth2.googleapis.com/tokeninfo', [
            'id_token' => $token
        ]);

        if ($googleResponse->failed()) {
            return response()->json(['message' => 'Invalid Google token'], 401);
        }

        $googleUser = $googleResponse->json();

        // Find or create user
        $user = User::updateOrCreate(
            ['email' => $googleUser['email']],
            [
                'user_name' => $googleUser['name'],
                'email' => $googleUser['email'],
                'google_id' => $googleUser['sub'],
                'email_verified_at' => $googleUser['email_verified'] ? now() : null,
                'password' => bcrypt(uniqid()) // Random password since Google handles auth
            ]
        );

        // Create Sanctum token
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }
}
