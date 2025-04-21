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
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            padding: 25px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo img {
            height: 50px;
            width: auto;
        }
        
        h2 {
            color: #4f46e5;
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
        }
        
        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .form-group input:focus {
            border-color: #4f46e5;
            outline: none;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .remember-me input {
            margin-right: 5px;
        }
        
        .remember-me label {
            font-size: 14px;
            color: #555;
        }
        
        .forgot-password {
            display: block;
            text-align: center;
            color: #4f46e5;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 15px;
        }
        
        .login-btn:hover {
            background-color: #4338ca;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 15px 0;
            color: #777;
            font-size: 14px;
        }
        
        .divider:before,
        .divider:after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: #ddd;
        }
        
        .divider:before {
            margin-right: 10px;
        }
        
        .divider:after {
            margin-left: 10px;
        }
        
        .social-login {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: white;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }
        
        .social-btn img {
            height: 18px;
            margin-right: 8px;
        }
        
        .social-btn:hover {
            background-color: #f5f5f5;
        }
        
        .register-link {
            text-align: center;
            font-size: 14px;
            color: #555;
        }
        
        .register-link a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
        }
        
        .register-link a:hover {
            text-decoration: underline;
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
                <input type="email" id="email" name="email" placeholder="exemple@email.com" required autofocus>
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
            </div>
            
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>
            
            <a href="#" class="forgot-password" id="forgot-password">Mot de passe oublié?</a>
            
            <button type="submit" class="login-btn">Se connecter</button>
        </form>
        
        <div class="divider">ou</div>
        
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
            Vous n'avez pas de compte? <a href="#" id="register-link">S'inscrire</a>
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