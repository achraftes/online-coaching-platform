<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Request</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f7fc;
            padding: 20px;
            margin: 0;
        }
        .email-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            color: #4A90E2;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .email-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .email-header i {
            font-size: 36px;
            color: #4A90E2;
            margin-right: 10px;
        }
        .email-header h3 {
            color: #333;
            font-size: 18px;
            font-weight: 600;
        }
        .email-content p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }
        .email-footer {
            margin-top: 30px;
            font-size: 14px;
            text-align: center;
            color: #777;
        }
        .email-footer a {
            color: #4A90E2;
            text-decoration: none;
        }
        .email-footer a:hover {
            text-decoration: underline;
        }
        .icon {
            color: #4A90E2;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <i class="fas fa-headset icon"></i>
            <h3>New Support Request</h3>
        </div>

        <div class="email-content">
            <p><strong>From:</strong> {{ $email }}</p>
            <p><strong>Subject:</strong> {{ $subject }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $userMessage }}</p>
        </div>

        <div class="email-footer">
            <p>If you have any questions, feel free to <a href="mailto:support@example.com">contact our support team</a>.</p>
        </div>
    </div>

    <!-- Add FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
