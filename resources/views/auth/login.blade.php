<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OnlyCoach</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        /* Le CSS que tu as déjà écrit (inchangé) */
        /* ... (Ton CSS complet ici) ... */
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="{{ asset('images/only coach (1).png') }}" alt="OnlyCoach Logo">
        </div>
        
        <h2>Connexion</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="exemple@email.com" required autofocus value="{{ old('email') }}">
                @error('email')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <div class="input-with-icon">
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                    <span class="input-icon" onclick="togglePasswordVisibility()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#777" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </span>
                </div>
                @error('password')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-actions">
                <div class="form-links">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Se souvenir de moi</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Mot de passe oublié?</a>
                </div>
                <button type="submit" class="login-btn">Se connecter</button>
            </div>
        </form>
        
        <div class="social-section">
            <div class="social-login">
                <a href="#" class="social-btn" id="google-login">
                    <img src="https://cdn.cdnlogo.com/logos/g/35/google-icon.svg" alt="Google">
                    Continuer avec Google
                </a>
                <a href="#" class="social-btn" id="facebook-login">
                    <img src="https://cdn.cdnlogo.com/logos/f/84/facebook.svg" alt="Facebook">
                    Continuer avec Facebook
                </a>
            </div>
            
            <div class="register-link">
                Vous n'avez pas de compte? <a href="{{ route('register') }}">S'inscrire</a>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>
