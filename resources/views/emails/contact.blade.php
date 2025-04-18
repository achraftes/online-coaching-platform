<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 30px;">
  <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); padding: 30px;">

    <!-- Header -->
    <div style="text-align: center; margin-bottom: 20px;">
      <h2 style="color: #4F46E5; font-size: 24px; margin: 0;">
        📩 New Contact Message
      </h2>
      <p style="color: #6c757d; font-size: 14px;">You have received a new message via your website's contact form.</p>
    </div>

    <!-- Contact Details -->
    <table style="width: 100%; border-collapse: collapse;">
      <tr>
        <td style="padding: 10px 0; font-weight: bold; color: #333;">
          🙍‍♂️ Name:
        </td>
        <td style="padding: 10px 0; color: #555;">
          {{ $details['name'] }}
        </td>
      </tr>
      <tr style="background-color: #f1f1f1;">
        <td style="padding: 10px 0; font-weight: bold; color: #333;">
          📧 Email:
        </td>
        <td style="padding: 10px 0; color: #555;">
          {{ $details['email'] }}
        </td>
      </tr>
      <tr>
        <td colspan="2" style="padding: 20px 0;">
          <strong style="color: #333;">📝 Message:</strong><br>
          <p style="color: #444; line-height: 1.6; margin-top: 10px;">{{ $details['body'] }}</p>
        </td>
      </tr>
    </table>

    <!-- Footer -->
    <div style="margin-top: 30px; text-align: center; font-size: 13px; color: #999;">
      This email was sent from your website contact form.
    </div>

  </div>
</body>
</html>
