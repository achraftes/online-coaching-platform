
<html>
<body>
    <h2>Nouveau RDV Programmé</h2>
    
    <p><strong>Client:</strong> {{ $data['fname'] }} {{ $data['lname'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Téléphone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Type de coaching:</strong> {{ $data['result'] === 'A' ? 'Confiance en soi' : 'Gestion du stress' }}</p>
    <p><strong>Date du RDV:</strong> {{ \Carbon\Carbon::parse($data['appointment_date'])->format('d/m/Y H:i') }}</p>
    
    @if(isset($event->htmlLink))
    <p>
        <a href="{{ $event->htmlLink }}" target="_blank">
            Voir sur Google Calendar
        </a>
    </p>
    @endif
</body>
</html>