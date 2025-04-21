<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OnlyCoach</title>
    
    <!-- Favicon et icônes -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">
    
    <!-- Styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #4f46e5, #db2777);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .login-container {
            background-color: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .logo img {
            height: 60px;
        }
        
        .login-container h2 {
            text-align: center;
            color: #4f46e5;
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
        }
        
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }
        
        .form-group input:focus {
            border-color: #4f46e5;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 0.5rem;
        }
        
        .forgot-password {
            color: #4f46e5;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }
        
        .forgot-password:hover {
            color: #4338ca;
            text-decoration: underline;
        }
        
        .login-btn {
            background-color: #4f46e5;
            color: white;
            font-weight: bold;
            border: none;
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        
        .login-btn:hover {
            background-color: #4338ca;
        }
        
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .register-link a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .register-link a:hover {
            color: #4338ca;
            text-decoration: underline;
        }
        
        .social-login {
            margin-top: 2rem;
            text-align: center;
        }
        
        .social-login p {
            color: #6b7280;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .social-login p:before, .social-login p:after {
            content: "";
            display: inline-block;
            width: 30%;
            height: 1px;
            background-color: #e5e7eb;
            position: absolute;
            top: 50%;
        }
        
        .social-login p:before {
            left: 0;
        }
        
        .social-login p:after {
            right: 0;
        }
        
        .social-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 1rem;
        }
        
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45%;
            padding: 0.5rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.5rem;
            background-color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            color: #374151;
        }
        
        .social-btn:hover {
            background-color: #f3f4f6;
        }
        
        .social-btn img {
            height: 24px;
            margin-right: 0.5rem;
        }
        
        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="logo">
            <img src="{{ asset('images/only coach (1).png') }}" alt="OnlyCoach Logo">
        </div>
        <h2>Connexion</h2>
        
        <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <div class="input-with-icon">
                    <input type="password" id="password" name="password" required>
                    <span class="input-icon" onclick="togglePasswordVisibility()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </span>
                </div>
            </div>
            
            <div class="form-footer">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" style="display: inline; font-weight: normal;">Se souvenir de moi</label>
                </div>
                <a href="#" class="forgot-password" id="forgot-password">Mot de passe oublié?</a>
            </div>
            
            <div class="form-group">
                <button type="submit" class="login-btn">Se connecter</button>
            </div>
        </form>
        
        <div class="register-link">
            Vous n'avez pas de compte? <a href="#" id="register-link">S'inscrire</a>
        </div>
        
        <div class="social-login">
            <p>Ou connectez-vous avec</p>
            <div class="social-buttons">
                <a href="#" class="social-btn" id="google-login">
                    <img src="https://cdn.cdnlogo.com/logos/g/35/google-icon.svg" alt="Google" width="24" height="24">
                    Google
                </a>
                <a href="#" class="social-btn" id="facebook-login">
                    <img src="https://cdn.cdnlogo.com/logos/f/84/facebook.svg" alt="Facebook" width="24" height="24">
                    Facebook
                </a>
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
        
        // Gérer le clic sur "Mot de passe oublié"
        document.getElementById('forgot-password').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Fonctionnalité de récupération de mot de passe - À implémenter');
        });
        
        // Gérer le clic sur "S'inscrire"
        document.getElementById('register-link').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Redirection vers la page d'inscription - À implémenter');
        });
        
        // Gérer les connexions sociales
        document.getElementById('google-login').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Connexion avec Google - À implémenter');
        });
        
        document.getElementById('facebook-login').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Connexion avec Facebook - À implémenter');
        });
        
        // Gérer la soumission du formulaire
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Formulaire soumis - À intégrer avec votre backend');
        });
    </script>
    
</body>
</html>