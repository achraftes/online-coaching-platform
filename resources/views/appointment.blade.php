{{-- resources/views/appointment.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre Rendez-vous</title>
    
    <!-- Favicon personnalisé -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('images/only coach (1).png') }}">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <style>
         .appointment-body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        
        .appointment-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .appointment-header {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.8rem;
            text-align: center;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .appointment-header::before {
            content: "📅";
            display: inline-block;
            font-size: 1.8rem;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #4a5568;
        }
        
        .form-group input[type="datetime-local"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        
        .form-group input[type="datetime-local"]:focus,
        .form-group textarea:focus {
            border-color: #4299e1;
            outline: none;
        }
        
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .appointment-button {
            width: 100%;
            padding: 12px;
            background: #4338CA;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .appointment-button:hover {
            background: #4338CA;
        }
    </style>
</head>
<body class="appointment-body">

    {{-- Inclusion du header --}}
    @include('layouts.header')

    <div class="appointment-container">
        <h2 class="appointment-header"> Prendre Rendez-vous</h2>
        
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('appointment.schedule') }}" method="POST">
            @csrf

            <input type="hidden" name="fname" value="{{ $fname }}">
            <input type="hidden" name="lname" value="{{ $lname }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="phone" value="{{ $phone }}">
            <input type="hidden" name="result" value="{{ $result }}">

            <div class="form-group">
                <label for="appointment_date">Choisissez un créneau :</label>
                <input 
                    type="datetime-local" 
                    id="appointment_date" 
                    name="appointment_date"
                    min="{{ now()->addDay()->format('Y-m-d\TH:i') }}"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="comment">Commentaires (facultatif) :</label>
                <textarea 
                    id="comment" 
                    name="comment" 
                    placeholder="Ajoutez des détails supplémentaires..."></textarea>
            </div>
            
            <button type="submit" class="appointment-button">Confirmer le RDV</button>
        </form>
    </div>

    {{-- Inclusion du footer --}}
    @include('layouts.footer')

</body>
</html>
