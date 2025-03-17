
<style>
    .container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn-primary {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h2>Prendre Rendez-vous</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('appointment.schedule') }}" method="POST">
        @csrf

        <!-- Champs cachés pour les données utilisateur -->
        <input type="hidden" name="fname" value="{{ $user['fname'] ?? '' }}">
        <input type="hidden" name="lname" value="{{ $user['lname'] ?? '' }}">
        <input type="hidden" name="email" value="{{ $user['email'] ?? '' }}">
        <input type="hidden" name="phone" value="{{ $user['phone'] ?? '' }}">
        <input type="hidden" name="result" value="{{ $user['result'] ?? '' }}">

        <!-- Sélection de la date -->
        <div class="form-group">
            <label for="appointment_date">Choisissez votre créneau :</label>
            <input type="datetime-local" 
                   id="appointment_date" 
                   name="appointment_date" 
                   class="form-control"
                   min="{{ now()->addDays(1)->format('Y-m-d\TH:i') }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Confirmer le RDV</button>
    </form>
</div>
