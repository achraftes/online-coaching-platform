<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login  OnlyCoach</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <!-- <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}"> -->

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
            padding: 21px;
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
            font-size: 29px;
            font-weight: 500;
            margin-bottom: 11px;
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
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="password-field">
                        <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                        <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5C7.453 5 3.57 7.909 2 12C3.57 16.091 7.453 19 12 19C16.547 19 20.43 16.091 22 12C20.43 7.909 16.547 5 12 5Z" stroke="#9a9aa8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#9a9aa8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
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
            </form>
            
            <div class="or-divider">Ou</div>
            
            <div class="social-signup">
                <a href="#" class="social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.1c-.22-.66-.35-1.36-.35-2.1s.13-1.44.35-2.1V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.61z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Continuer avec Google
                </a>
                
                <a href="#" class="social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
                        <path d="M16.671 15.073l.532-3.47h-3.328v-2.25c0-.949.465-1.874 1.956-1.874h1.513V4.526s-1.374-.235-2.686-.235c-2.741 0-4.533 1.662-4.533 4.669v2.672H7.078v3.47h3.047v8.385c.61.093 1.234.14 1.87.14s1.26-.047 1.87-.14v-8.385h2.796z" fill="white"/>
                    </svg>
                    Continuer avec Facebook
                </a>
            </div>
        </div>
    </div>

    <script>
        // Script pour basculer la visibilité du mot de passe
        document.querySelector('.eye-icon').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const currentType = passwordInput.type;
            
            if (currentType === 'password') {
                passwordInput.type = 'text';
                this.innerHTML = `
                    <path d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12C22 12 19 19 12 19C5 19 2 12 2 12Z" stroke="#9a9aa8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#9a9aa8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 3L21 21" stroke="#9a9aa8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                `;
            } else {
                passwordInput.type = 'password';
                this.innerHTML = `
                    <path d="M12 5C7.453 5 3.57 7.909 2 12C3.57 16.091 7.453 19 12 19C16.547 19 20.43 16.091 22 12C20.43 7.909 16.547 5 12 5Z" stroke="#9a9aa8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#9a9aa8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                `;
            }
        });
    </script>
</body>
</html>