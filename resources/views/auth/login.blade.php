<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login  OnlyCoach</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a1a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            display: flex;
            width: 100%;
            max-width: 900px;
            height: 600px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .left-panel {
            flex: 1;
            position: relative;
            overflow: hidden;
        }
        
        .left-panel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        .slogan-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 40px;
            color: white;
            text-align: center;
        }
        
        .slogan-overlay h2 {
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 10px;
            color: white;
        }
        
        .dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 15px;
        }
        
        .dot {
            width: 8px;
            height: 8px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
        }
        
        .dot.active {
            background-color: white;
            width: 24px;
            border-radius: 4px;
        }
        
        .right-panel {
            flex: 1;
            background-color: #2c2c34;
            padding: 40px;
            color: white;
            overflow-y: auto;
        }
        
        .back-link {
            display: inline-block;
            color: white;
            text-decoration: none;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        h1 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .register-link {
            font-size: 14px;
            color: #ccc;
            margin-bottom: 30px;
        }
        
        .register-link a {
            color: white;
            text-decoration: none;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 400;
            color: #ccc;
            font-size: 14px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            background-color: #3a3a42;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
        }
        
        .form-group input::placeholder {
            color: #9a9aa8;
        }
        
        .form-group input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(123, 97, 255, 0.5);
        }
        
        .password-field {
            position: relative;
        }
        
        .password-field .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9a9aa8;
            cursor: pointer;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .remember-me input {
            margin-right: 10px;
        }
        
        .remember-me label {
            font-size: 14px;
            color: #ccc;
        }
        
        .forgot-password {
            font-size: 14px;
            color: #ccc;
            text-decoration: none;
            margin-left: auto;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
            color: white;
        }
        
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #7b61ff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.2s ease;
        }
        
        .login-btn:hover {
            background-color: #6b53e0;
        }
        
        .or-divider {
            text-align: center;
            color: #9a9aa8;
            font-size: 14px;
            margin: 25px 0;
            position: relative;
        }
        
        .or-divider::before, .or-divider::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #444450;
        }
        
        .or-divider::before {
            left: 0;
        }
        
        .or-divider::after {
            right: 0;
        }
        
        .social-signup {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }
        
        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            background-color: #3a3a42;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-decoration: none;
        }
        
        .social-btn svg, .social-btn img {
            height: 18px;
            width: 18px;
            margin-right: 8px;
        }
        
        .social-btn:hover {
            background-color: #444450;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            
            .left-panel {
                min-height: 200px;
            }
            
            .social-signup {
                flex-direction: column;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .forgot-password {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <img src="{{ asset('images/Consultation de coaching.jpg') }}" alt="OnlyCoach Background">
            <div class="slogan-overlay">
                <h2>Capturing Moments,<br>Creating Memories</h2>
                <div class="dots">
                    <div class="dot"></div>
                    <div class="dot active"></div>
                    <div class="dot"></div>
                </div>
            </div>
        </div>
        
        <div class="right-panel">
            <a href="{{ url('/') }}" class="back-link">← Retour au site</a>
            
            <h1>Connexion</h1>
            
            <p class="register-link">Vous n'avez pas de compte? <a href="{{ route('register') }}">S'inscrire</a></p>
            
            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" placeholder="exemple@email.com" required autofocus value="{{ old('email') }}">
                    @error('email')
                        <small style="color: #ff6b6b;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group password-field">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <span class="eye-icon" onclick="togglePasswordVisibility()">👁️</span>
                    @error('password')
                        <small style="color: #ff6b6b;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Se souvenir de moi</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Mot de passe oublié?</a>
                </div>
                
                <button type="submit" class="login-btn">Se connecter</button>
                
                <div class="or-divider">OU</div>
                
                <div class="social-signup">
                    <a href="{{ route('login.google') }}" class="social-btn">
                        <img src="https://img.icons8.com/ios/50/000000/google-logo.png" alt="Google Logo"> Connexion avec Google
                    </a>
                    <a href="{{ route('login.facebook') }}" class="social-btn">
                        <img src="https://img.icons8.com/ios/50/000000/facebook-new.png" alt="Facebook Logo"> Connexion avec Facebook
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.eye-icon');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.textContent = "🙈";
            } else {
                passwordInput.type = "password";
                icon.textContent = "👁️";
            }
        }
    </script>
</body>
</html>
