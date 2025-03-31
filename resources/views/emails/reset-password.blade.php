<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #111827;
            color: #f3f4f6;
            line-height: 1.5;
        }

        .email-reset-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .outerBack {
            background-color: #1f2937;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            border: 1px solid #374151;
        }

        .form {
            padding: 32px;
            text-align: center;
        }

        .logo {
            height: 40px;
            margin-bottom: 24px;
        }

        .title {
            font-size: 24px;
            font-weight: 600;
            color: #818cf8;
            margin: 0 0 20px 0;
        }

        .prompt {
            text-align: left;
            margin-bottom: 24px;
            color: #d1d5db;
        }

        .prompt p {
            margin: 0 0 16px 0;
        }

        .reset-button {
            display: inline-block;
            background-color: #4f46e5;
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 12px 24px;
            border-radius: 8px;
            margin: 16px 0;
            transition: background-color 0.2s;
        }

        .reset-button:hover {
            background-color: #4338ca;
        }

        .footer {
            text-align: left;
            margin-top: 32px;
            color: #9ca3af;
            font-size: 14px;
            border-top: 1px solid #374151;
            padding-top: 24px;
        }

        .footer p {
            margin: 0 0 16px 0;
        }

        .reset-link {
            display: block;
            word-break: break-all;
            color: #818cf8;
            text-decoration: none;
            margin: 12px 0 24px;
            font-size: 13px;
        }

        .regards {
            margin-top: 24px !important;
        }

        .info {
            text-align: center;
            margin-top: 24px;
            color: #6b7280;
            font-size: 12px;
        }

        .highlight {
            font-weight: 600;
            color: #f3f4f6;
        }

        @media (max-width: 480px) {
            .form {
                padding: 24px;
            }

            .title {
                font-size: 20px;
            }

            .reset-button {
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
</head>
<body>
    <div class="email-reset-container">
        <div class="outerBack">
            <div class="form">
                <img class="logo" src="https://assets.onecompiler.app/43dcd82z8/43dc8cfaq/StoxifyLogo.png" alt="Stoxify Logo"/>

                <h2 class="title">Reset Your Password</h2>

                <div class="prompt">
                    <p>Hello <span class="highlight">{{ $email }}</span>,</p>
                    <p><span class="highlight">We received a request to reset your password</span> for your <strong>Stoxify</strong> account.</p>
                    <p>If you requested this, <span class="highlight">click the button below to set a new password</span>:</p>
                </div>

                <a href="{{ $resetUrl }}" class="reset-button">Reset Password</a>

                <div class="footer">
                    <p><span class="highlight">This link will expire in 60 minutes</span>. If you didn't request a password reset, you can safely ignore this email.</p>
                    <p><span class="highlight">For security, never share your password with anyone.</span></p>

                    <p>Or paste this link into your browser:</p>
                    <a href="{{ $resetUrl }}" class="reset-link">{{ $resetUrl }}</a>

                    <p class="regards">Regards,<br>
                    <strong>Stoxify Team</strong></p>
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
