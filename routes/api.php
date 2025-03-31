<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;


Route::get('/v1/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/v1/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])->name('two-factor.qr-code');
Route::middleware('auth:sanctum')->post('v1/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])->name('two-factor.qr-code');

Route::middleware('auth:sanctum')->post('v1/user/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])->name('two-factor.login.store');

Route::middleware('auth:sanctum')->post('/v1/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware('auth:sanctum') ->get('v1/email/verify/{id}/{hash}', [VerifyEmailController::class , '__invoke'])->name('verification.verify');
