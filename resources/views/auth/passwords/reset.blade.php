<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Réinitialiser le mot de passe</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Global styles */
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            font-family: 'Poppins', sans-serif;
            color: #2d3748;
            min-height: 100vh;
        }

        /* Main container */
        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
        }

        /* Card styling */
        .card {
            width: 100%;
            max-width: 520px;
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        /* Card header */
        .card-header {
            background: linear-gradient(to right, #4776E6, #8E54E9);
            color: #fff;
            text-align: center;
            padding: 1.8rem 1.5rem;
            border-bottom: none;
        }

        .card-header h3 {
            margin-bottom: 0;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 1.5rem;
        }

        .card-header .icon {
            background-color: rgba(255, 255, 255, 0.2);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        /* Card body */
        .card-body {
            padding: 2.5rem;
            background-color: #fff;
        }

        /* Form elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: #4a5568;
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            height: auto;
            font-size: 1rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #8E54E9;
            box-shadow: 0 0 0 3px rgba(142, 84, 233, 0.15);
            background-color: #fff;
        }

        .invalid-feedback {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        /* Password field with show/hide toggle */
        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 12px;
            color: #718096;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        /* Button styling */
        .btn-primary {
            background: linear-gradient(to right, #4776E6, #8E54E9);
            border: none;
            border-radius: 8px;
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            width: 100%;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(71, 118, 230, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #3967d7, #7f45da);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(71, 118, 230, 0.4);
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        /* Password strength indicator */
        .password-strength {
            display: none;
            margin-top: 0.5rem;
        }
        
        .strength-meter {
            height: 4px;
            background-color: #e2e8f0;
            border-radius: 4px;
            margin-top: 0.5rem;
            overflow: hidden;
        }
        
        .strength-meter-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s ease, background-color 0.3s ease;
            width: 0%;
        }
        
        .strength-text {
            font-size: 0.8rem;
            color: #718096;
            margin-top: 0.25rem;
        }
        
        /* Footer */
        .card-footer {
            background-color: #fff;
            border-top: 1px solid #f0f4f8;
            padding: 1.2rem 2.5rem;
            text-align: center;
            color: #718096;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="icon">
                <i class="fas fa-key fa-lg"></i>
            </div>
            <h3>{{ __('Réinitialiser le mot de passe') }}</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}" id="reset-form">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Adresse email') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="fas fa-envelope text-muted"></i>
                        </span>
                        <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="exemple@domaine.com">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Nouveau mot de passe') }}</label>
                    <div class="input-group password-field">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="fas fa-lock text-muted"></i>
                        </span>
                        <input id="password" type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength" id="password-strength">
                        <div class="strength-meter">
                            <div class="strength-meter-fill" id="strength-meter-fill"></div>
                        </div>
                        <div class="strength-text" id="strength-text">Force du mot de passe: <span>Faible</span></div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                    <div class="input-group password-field">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="fas fa-lock text-muted"></i>
                        </span>
                        <input id="password-confirm" type="password" class="form-control border-start-0" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                        <button type="button" class="password-toggle" onclick="togglePassword('password-confirm')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group mb-0 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check-circle me-2"></i>{{ __('Réinitialiser le mot de passe') }}
                    </button>
                </div>
            </form>
        </div>
        
        <div class="card-footer">
            <p class="mb-0">Besoin d'aide ? <a href="#" class="text-decoration-none">Contactez notre support</a></p>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Function to toggle password visibility
    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const toggleButton = passwordField.nextElementSibling;
        const toggleIcon = toggleButton.querySelector('i');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
    
    // Password strength meter
    const passwordInput = document.getElementById('password');
    const strengthMeter = document.getElementById('password-strength');
    const strengthFill = document.getElementById('strength-meter-fill');
    const strengthText = document.getElementById('strength-text').querySelector('span');
    
    passwordInput.addEventListener('input', function() {
        if (this.value.length > 0) {
            strengthMeter.style.display = 'block';
            
            // Calculate password strength
            let strength = 0;
            if (this.value.length > 6) strength += 25;
            if (this.value.length > 10) strength += 25;
            if (/[A-Z]/.test(this.value)) strength += 25;
            if (/[0-9]/.test(this.value)) strength += 25;
            if (/[^A-Za-z0-9]/.test(this.value)) strength += 25;
            
            // Cap at 100
            strength = Math.min(strength, 100);
            
            // Update UI
            strengthFill.style.width = strength + '%';
            
            if (strength < 30) {
                strengthFill.style.backgroundColor = '#e53e3e';
                strengthText.textContent = 'Faible';
            } else if (strength < 70) {
                strengthFill.style.backgroundColor = '#ed8936';
                strengthText.textContent = 'Moyen';
            } else {
                strengthFill.style.backgroundColor = '#38a169';
                strengthText.textContent = 'Fort';
            }
        } else {
            strengthMeter.style.display = 'none';
        }
    });
    
    // Check password match
    const confirmPasswordInput = document.getElementById('password-confirm');
    const resetForm = document.getElementById('reset-form');
    
    resetForm.addEventListener('submit', function(e) {
        if (passwordInput.value !== confirmPasswordInput.value) {
            e.preventDefault();
            alert('Les mots de passe ne correspondent pas.');
        }
    });
</script>

</body>
</html>