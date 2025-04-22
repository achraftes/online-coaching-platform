<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Header avec Profil</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        header {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: 6rem;
        }

        .header-container {
            max-width: 72rem;
            margin: 0 auto;
            padding: 0 2rem;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .logo img {
            height: 8rem;
            width: auto;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1000;
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: white;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 1rem 0;
                z-index: 999;
            }

            .nav-links.show {
                display: flex;
            }

            .logo img {
                height: 6rem;
            }

            .buttons {
                flex-direction: column;
                width: 100%;
                padding: 0 1rem;
                margin-top: 1rem;
            }

            .buttons a {
                width: 100%;
                text-align: center;
            }

            .profile-icon {
                display: none;
            }
        }

        .nav-links a {
            font-weight: 500;
            color: #1f2937;
            text-decoration: none;
            transition: color 0.3s ease;
            position: relative;
            font-size: 1rem;
            padding: 0.5rem 0.75rem;
        }

        .nav-links a:hover {
            color: #4f46e5;
        }

        .nav-links a span {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background-color: #4f46e5;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .nav-links a:hover span {
            transform: scaleX(1);
        }

        .buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .login-btn {
            background-color: #db2777;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 700;
            border: 2px solid #db2777;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background-color: white;
            color: #db2777;
            border-color: #db2777;
        }

        .signup-btn {
            background-color: #4f46e5;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 700;
            border: 2px solid #4f46e5;
            transition: all 0.3s ease;
        }

        .signup-btn:hover {
            background-color: white;
            color: #3730a3;
            border-color: #3730a3;
        }

        .profile-icon {
            font-size: 2rem;
            color: #4f46e5;
            transition: color 0.3s ease;
            margin-left: 1rem;
        }

        .profile-icon:hover {
            color: #3730a3;
        }
    </style>
</head>
<body>

<header>
    <div class="header-container">
        <a href="/" class="logo">
            <img src="{{ asset('images/only coach (1).png') }}" alt="Logo Coaching Professionel">
        </a>

        <div class="menu-toggle">☰</div>

        <nav class="nav-links">
            <a href="/">Home<span></span></a>
            <a href="{{ env('APP_URL') }}#services">Services<span></span></a>
            <a href="{{ env('APP_URL') }}#features">Test<span></span></a>
            <a href="{{ env('APP_URL') }}#blogs">Blogs<span></span></a>
            <a href="{{ env('APP_URL') }}#pricing">Tarifs<span></span></a>
            <a href="{{ env('APP_URL') }}#testimonials">Témoignages<span></span></a>
            <a href="{{ env('APP_URL') }}#contacts">Contact<span></span></a>

            <div class="buttons">
                <a href="{{ route('login') }}" class="login-btn">Login</a>
                <a href="{{ route('register') }}" class="signup-btn">Devenir un Coach</a>
            </div>
        </nav>

        <!-- Icône de profil à droite -->
        <a href="{{ route('compte.index') }}" class="profile-icon">
            <i class="fas fa-user-circle"></i>
        </a>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');

        menuToggle.addEventListener('click', function () {
            navLinks.classList.toggle('show');
            this.textContent = navLinks.classList.contains('show') ? '✕' : '☰';
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.header-container')) {
                navLinks.classList.remove('show');
                menuToggle.textContent = '☰';
            }
        });
    });
</script>

</body>
</html>
