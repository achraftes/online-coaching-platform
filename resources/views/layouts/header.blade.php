<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Header Professionnel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        header {
            background: white;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            height: 5.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 100%;
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .logo img {
            height: 3.5rem;
            transition: transform 0.3s ease;
        }

        .logo:hover img {
            transform: scale(1.05);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            flex-grow: 1;
        }

        .nav-links a {
            color: #1f2937;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.75rem 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #4f46e5;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a.active {
            color: #4f46e5;
            font-weight: 600;
        }

        .buttons {
            display: flex;
            gap: 1rem;
            margin-left: auto;
        }

        .login-btn,
        .signup-btn {
            padding: 0.6rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .login-btn {
            background: transparent;
            color: #4f46e5;
            border: 2px solid #e0e7ff;
        }

        .login-btn:hover {
            background: #eef2ff;
            border-color: #c7d2fe;
        }

        .signup-btn {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            border: none;
            box-shadow: 0 2px 4px rgba(79, 70, 229, 0.2);
        }

        .signup-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(79, 70, 229, 0.3);
        }

        .profile-icon {
            font-size: 1.8rem;
            color: #4f46e5;
            transition: transform 0.3s ease;
            margin-left: 1.5rem;
        }

        .profile-icon:hover {
            transform: scale(1.1);
        }

        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            color: #4f46e5;
            background: none;
            border: none;
            cursor: pointer;
        }

        @media (max-width: 1024px) {
            .header-container {
                gap: 1.5rem;
                padding: 0 1.5rem;
            }

            .nav-links {
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
                margin-left: auto;
            }

            .nav-links {
                position: fixed;
                top: 5.5rem;
                left: 0;
                right: 0;
                bottom: 0;
                background: white;
                flex-direction: column;
                align-items: flex-start;
                padding: 2rem;
                gap: 1.5rem;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .nav-links.show {
                transform: translateX(0);
            }

            .buttons {
                flex-direction: column;
                width: 100%;
                margin: 1rem 0;
            }

            .nav-links a {
                font-size: 1.1rem;
                padding: 0.5rem 0;
            }

            .logo img {
                height: 3rem;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="header-container">
        <a href="/" class="logo">
            <img src="{{ asset('images/only coach (1).png') }}" alt="Coaching Pro">
        </a>

        <button class="menu-toggle">☰</button>

        <nav class="nav-links">
            <a href="/" class="active">Accueil</a>
            <a href="#services">Services</a>
            <a href="#features">Test</a>
            <a href="#blogs">Blog</a>
            <a href="#pricing">Tarifs</a>
            <a href="#testimonials">Avis</a>
            <a href="#contacts">Contact</a>

            <div class="buttons">
                <a href="/login" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    Connexion
                </a>
                <a href="/register" class="signup-btn">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Devenir Coach
                </a>
            </div>
        </nav>

        <a href="{{ route('compte.index') }}" class="profile-icon">
            <i class="fas fa-user-circle"></i>
        </a>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('show');
            menuToggle.textContent = navLinks.classList.contains('show') ? '✕' : '☰';
        });

        // Fermer le menu au clic à l'extérieur
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.header-container')) {
                navLinks.classList.remove('show');
                menuToggle.textContent = '☰';
            }
        });

        // Animation au scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            header.style.boxShadow = window.scrollY > 10 ? 
                '0 4px 30px rgba(0, 0, 0, 0.1)' : 
                '0 4px 30px rgba(0, 0, 0, 0.05)';
        });
    });
</script>

</body>
</html>