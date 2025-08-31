
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau RDV Coaching</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd;">
        <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
            🗓️ Nouveau RDV Programmé
        </h2>

        <!-- Informations client -->
        <div style="margin-bottom: 20px;">
            <h3 style="color: #3498db;">👤 Client</h3>
            <p><strong>Nom :</strong> {{ $data['fname'] }} {{ $data['lname'] }}</p>
            <p><strong>Email :</strong> {{ $data['email'] }}</p>
            <p><strong>Téléphone :</strong> {{ $data['phone'] }}</p>
        </div>

        <!-- Détails du RDV -->
        <div style="margin-bottom: 20px;">
            <h3 style="color: #3498db;">📅 Rendez-vous</h3>
            <p><strong>Type :</strong> {{ $data['result'] === 'A' ? 'Confiance en soi' : 'Gestion du stress' }}</p>
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($data['appointment_date'])->format('d/m/Y à H\hi') }}</p>
            
            @if(!empty($data['comment']))
                <p><strong>Commentaire :</strong><br>{{ $data['comment'] }}</p>
            @endif
        </div>

        <!-- Lien Google Calendar -->
        @if(isset($event->htmlLink))
        <div style="text-align: center; margin-top: 25px;">
            <a href="{{ $event->htmlLink }}" 
               target="_blank"
               style="background: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                🔗 Voir sur Google Calendar
            </a>
        </div>
        @endif

        <!-- Footer -->
        <div style="margin-top: 30px; font-size: 0.9em; color: #666; border-top: 1px solid #eee; padding-top: 15px;">
            <p>Cet email a été envoyé automatiquement par le système de RDV.</p>
        </div>
    </div>
</body>
</html>