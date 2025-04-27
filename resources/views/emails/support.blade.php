<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Request</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px;">
    <div style="background: white; padding: 30px; border-radius: 8px;">
        <h2 style="color: #333;">New Support Request</h2>
        <p><strong>From:</strong> {{ $email }}</p>
        <p><strong>Subject:</strong> {{ $subject }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $message }}</p>
    </div>
</body>
</html>
