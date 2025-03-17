
    <style>
        .container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4a5568;
            font-weight: 600;
        }

        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s;
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
            padding: 1rem;
            background: #4299e1;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #3182ce;
        }
    </style>

    <div class="container">
        <h2>📅 Prendre Rendez-vous</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('appointment.schedule') }}" method="POST">
            @csrf

            <!-- Champs cachés -->
            <input type="hidden" name="fname" value="{{ $user['fname'] }}">
            <input type="hidden" name="lname" value="{{ $user['lname'] }}">
            <input type="hidden" name="email" value="{{ $user['email'] }}">
            <input type="hidden" name="phone" value="{{ $user['phone'] }}">
            <input type="hidden" name="result" value="{{ $user['result'] }}">

            <!-- Sélection de la date -->
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

            <!-- Commentaire optionnel -->
            <div class="form-group">
                <label for="comment">Commentaires (facultatif) :</label>
                <textarea 
                    id="comment" 
                    name="comment" 
                    placeholder="Ajoutez des détails supplémentaires ou des préférences pour votre rendez-vous..."


                ></textarea>
            </div>

            <button type="submit">Confirmer le RDV</button>
        </form>
    </div>
