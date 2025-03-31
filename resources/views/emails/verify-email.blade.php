<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="email-verification-container">
        <div class="outerBack">
            <div class="form">
                <img class="logo" src="https://assets.onecompiler.app/43dcd82z8/43dc8cfaq/StoxifyLogo.png" alt="Stoxify Logo"/>
                <h2 class="title">Hi {{ $user->name }} , welcome to <span class="highlight">Stoxify</span>!</h2>
                <div class="prompt">
                    <p>Please confirm that you want to use this as your Stoxify account email address. Once it's done, you will be able to start trading!</p>
                </div>
                <a href=" {{ $verificationUrl }} " class="verify-button">Verify my email</a>
                <div class="footer">
                    <p>Or paste this link into your browser:</p>
                    <a href="{{ $verificationUrl }}" class="verification-link">{{ $verificationUrl }} </a>
                    <p class="regards">Regards, Stoxify team.</p>
                </div>
            </div>
        </div>
        <div class="info">
            <p>&copy; 2025 Stoxify. All rights reserved.</p>
            <p>Stoxify, Beirut, Lebanon.</p>
        </div>
    </div>
</body>
</html>
