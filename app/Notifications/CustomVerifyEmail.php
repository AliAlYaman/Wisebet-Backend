<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class CustomVerifyEmail extends VerifyEmailBase
{
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the verification URL.
     */
    protected function verificationUrl($notifiable)
    {

        $temporarySignedUrl = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );

        $frontendUrl = 'http://localhost:5173/email-verification?verification_url=' . urlencode($temporarySignedUrl);
        // Replace Laravel URL with your React URL
        return $frontendUrl;
    }

    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->view('emails.verify-email', [
                'verificationUrl' => $verificationUrl,
                'user' => $notifiable
            ]);
    }
}
