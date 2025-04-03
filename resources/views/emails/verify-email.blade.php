<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Albert Sans', Arial, sans-serif; background-color: #000; color: #fff;">
    <!-- Main Container -->
    <div style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px 15px; min-height: 100vh; display: flex; flex-direction: column;">
        <!-- Content Card -->
        <div style="background-color: #1e1e1e; border-radius: 4px; padding: 2rem; text-align: center; width: 100%; margin: 0 auto;">
            <!-- Logo -->
            <div style="font-weight: bold; margin-bottom: 10px; font-size: 16px; color: #fff;">STOXIFY</div>
            <img src="https://assets.onecompiler.app/43dcd82z8/43dc8cfaq/StoxifyLogo.png"
                 alt="Stoxify Logo"
                 style="display: block; width: 120px; height: auto; margin: 0 auto 1rem;">

            <!-- Title -->
            <h2 style="color: #fff; font-weight: bold; font-size: 1.75rem; margin: 1rem 0; line-height: 1.3;">
                Hi {{ $user->name }}, welcome to <span style="color: #34FC8C;">Stoxify</span>!
            </h2>

            <!-- Message -->
            <div style="margin: 1rem 0; line-height: 1.5; font-size: 1rem; color: #fff;">
                <p>Please confirm that you want to use this as your Stoxify account email address. Once it's done, you will be able to start trading!</p>
            </div>

            <!-- Verify Button -->
            <a href="{{ $verificationUrl }}"
               style="background-color: #34FC8C; padding: 12px 2rem; font-weight: 600; border-radius: 4px; text-decoration: none; color: #000; display: inline-block; max-width: 250px; margin: 1.5rem auto; font-size: 1rem;">
                Verify my email
            </a>

            <!-- Footer Links -->
            <div style="color: #fff; font-size: 0.875rem; line-height: 1.5; padding-top: 1rem; border-top: 1px solid #333; margin-top: 1rem;">
                <p>Or paste this link into your browser:</p>
                <a href="{{ $verificationUrl }}" style="color: #34FC8C; word-break: break-all; display: inline-block; margin: 0.5rem 0; text-decoration: none; font-size: 0.8rem;">
                    {{ $verificationUrl }}
                </a>
                <p style="padding-top: 1rem; margin-top: 1rem; font-size: 0.9rem;">Regards, Stoxify team.</p>
            </div>
            <!-- Company Info -->
            <div style="color: #767474; font-size: 0.75rem; line-height: 1.5; padding: 1rem 0; text-align: center; margin-top: auto;">
                <p>&copy; 2025 Stoxify. All rights reserved.</p>
                <p>Stoxify, Beirut, Lebanon.</p>
            </div>
        </div>

    </div>
</body>
</html>
