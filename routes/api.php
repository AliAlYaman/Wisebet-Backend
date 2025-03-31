<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;

Route::get('/v1/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->post('/v1/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware('auth:sanctum') ->get('v1/email/verify/{id}/{hash}', [VerifyEmailController::class , '__invoke'])->name('verification.verify');
