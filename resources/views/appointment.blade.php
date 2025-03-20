<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre Rendez-vous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        h2 {
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
        
        h2::before {
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
        
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #4a5568;
        }
        
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        
        input[type="datetime-local"]:focus,
        textarea:focus {
            border-color: #4299e1;
            outline: none;
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        button {
            width: 100%;
            padding: 12px;
            background: #4299e1;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        button:hover {
            background: #3182ce;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Make an appointment</h2>
        
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('appointment.schedule') }}" method="POST">
            @csrf
            
            <!-- Champs cachés -->
            <input type="hidden" name="fname" value="{{ $fname }}">
            <input type="hidden" name="lname" value="{{ $lname }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="phone" value="{{ $phone }}">
            <input type="hidden" name="result" value="{{ $result }}">
            
            <!-- Sélection de la date -->
            <div class="form-group">
                <label for="appointment_date">Choose a slot:</label>
                <input 
                    type="datetime-local" 
                    id="appointment_date" 
                    name="appointment_date"
                    min="{{ now()->addDay()->format('Y-m-d\TH:i') }}"
                    required
                >
            </div>
            
            <!-- Commentaire optionnel -->
            <div class="form-group">
                <label for="comment">Comments (optional):</label>
                <textarea 
                    id="comment" 
                    name="comment" 
                    placeholder="Add additional details..."
                ></textarea>
            </div>
            
            <button type="submit">Confirm the appointment</button>
        </form>
    </div>
</body>
</html>