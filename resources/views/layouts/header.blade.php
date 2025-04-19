<style>
    /* Base Styles */
    header {
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 100%;
        height: 6rem; /* h-24 */
    }

    .header-container {
        max-width: 72rem; /* max-w-6xl */
        margin: 0 auto;
        padding: 0 2rem; /* px-8 */
        height: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .logo img {
        height: 8rem; /* h-32 */
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

    /* Mobile Styles */
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

        .buttons {
            display: none;
        }

        .logo img {
            height: 6rem;
        }
    }

    /* Liens */
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

    /* Boutons */
    .buttons {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .login-btn {
        color: #db2777;
        font-weight: 700;
        border: 2px solid #db2777;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        transition: all 0.3s ease;
    }

    .login-btn:hover {
        background-color: #db2777;
        color: white;
    }

    .signup-btn {
        background-color: #4f46e5;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 700;
        transition: background-color 0.3s ease;
    }

    .signup-btn:hover {
        background-color: #3730a3;
    }
</style>

<header>
    <div class="header-container">
        <a href="/" class="logo">
            <img src="{{ asset('images/only coach (1).png') }}" alt="Logo Coaching Professionel">
        </a>

        <div class="menu-toggle">☰</div>

        <nav class="nav-links">  
            <a href="/">Home<span></span></a>
            <a href="{{ env('APP_URL') }}#features">Test Gratuit<span></span></a>
            <a href="{{ env('APP_URL') }}#blogs">Blogs<span></span></a>
            <a href="{{ env('APP_URL') }}#pricing">Nos Tarifs<span></span></a>
            <a href="{{ env('APP_URL') }}#testimonials">Témoignages<span></span></a>
            <a href="{{ env('APP_URL') }}#contacts">Contact<span></span></a>
        </nav>

        <!-- ✅ Boutons -->
        <div class="buttons">
            <a href="" class="login-btn">Login</a>
            <a href="" class="signup-btn">Devenir un Coach</a>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');

        menuToggle.addEventListener('click', function() {
            navLinks.classList.toggle('show');
            this.textContent = navLinks.classList.contains('show') ? '✕' : '☰';
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.header-container')) {
                navLinks.classList.remove('show');
                menuToggle.textContent = '☰';
            }
        });
    });
</script>
