<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use App\Mail\CustomResetPasswordMail;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use PragmaRX\Google2FALaravel\Google2FA;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        "user_name",
        "email",
        "password",
        'two_factor_secret',
        'two_factor_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        "password",
        "remember_token",
    ];

    protected $casts = [
        "email_verified_at" => "datetime",
        "role" => UserRoleEnum::class,
        'two_factor_verified' => 'boolean',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail($this));
    }

    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->email)->send(new CustomResetPasswordMail($token, $this->email));
    }
    public function google2fa(): Google2FA
    {
        return app(Google2FA::class);
    }

    public function generateTwoFactorCode()
    {
        $this->update([
            'two_factor_secret' => encrypt($this->google2fa()->generateSecretKey()),
            'two_factor_verified' => now()
        ]);
    }
}
