<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Rendez-vous</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f4f4f4; border-radius: 10px; }
        h2 { color: #333; }
        p { color: #555; }
        .details { background: white; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>📅 Détails du Rendez-vous</h2>
        <div class="details">
            <p><strong>Nom :</strong> {{ $details['fname'] }} {{ $details['lname'] }}</p>
            <p><strong>Email :</strong> {{ $details['email'] }}</p>
            <p><strong>Téléphone :</strong> {{ $details['phone'] }}</p>
            <p><strong>Date du Rendez-vous :</strong> {{ $details['appointment_date'] }}</p>
            <p><strong>Commentaire :</strong> {{ $details['comment'] ?? 'Aucun' }}</p>
        </div>
    </div>
</body>
</html>
