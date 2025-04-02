<?php

use App\Http\Controllers\Controller;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use PragmaRX\Google2FALaravel\Google2FA;

Route::get('/v1/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//   // Generate QR Code
//   Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show']);

//   // Enable 2FA
//   Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store']);

//   // Disable 2FA
//   Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy']);
Route::middleware('auth:sanctum')->post('/v1/enable-2fa', function (Request $request) {
    $user = $request->user();

    if ($user->two_factor_secret) {
        return response()->json(['message' => '2FA already enabled'], 400);
    }

    $user->generateTwoFactorCode();

    $google2fa = new Google2FA($request);
    $secret = decrypt($user->two_factor_secret);

    $qrCode = (new Writer(new ImageRenderer(
        new RendererStyle(200),
        new SvgImageBackEnd()
    )))->writeString($google2fa->getQRCodeUrl(
        config('app.name'),
        $user->email,
        $secret
    ));

    return response()->json([
        'secret' => $secret,
        'qr_code' => 'data:image/svg+xml;base64,' . base64_encode($qrCode),
    ]);
});

Route::middleware('auth:sanctum')->post('/v1/verify-2fa', function (Request $request) {
    $request->validate(['code' => 'required|digits:6']);

    $user = $request->user();
    $google2fa = new Google2FA($request);

    if (!$user->two_factor_secret) {
        return response()->json(['message' => '2FA is not enabled'], 400);
    }

    $isValid = $google2fa->verifyKey(decrypt($user->two_factor_secret), $request->code);

    if ($isValid) {
        $user->update(['two_factor_verified' => true]);
        return response()->json(['message' => '2FA verified successfully']);
    }

    return response()->json(['message' => 'Invalid 2FA code'], 422);
});

Route::middleware('auth:sanctum')->post('/v1/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware('auth:sanctum') ->get('v1/email/verify/{id}/{hash}', [VerifyEmailController::class , '__invoke'])->name('verification.verify');
