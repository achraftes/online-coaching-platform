<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaching Professionnel - Design Épuré</title>
    <style>
        /* Styles généraux */
        :root {
            --primary: #2D3047;
            --accent: #5C6AC4;
            --light: #F8F9FA;
            --grey: #E9ECEF;
            --dark: #212529;
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: white;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }
        
        /* Header / Hero */
        .hero {
            padding: 120px 0 100px;
            background-color: var(--light);
            position: relative;
            overflow: hidden;
        }
        
        .hero-content {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 80px;
        }
        
        @media (min-width: 992px) {
            .hero-content {
                flex-direction: row;
            }
        }
        
        .hero-text {
            flex: 1;
        }
        
        .hero-headline {
            font-size: 48px;
            line-height: 1.2;
            margin-bottom: 24px;
            color: var(--primary);
            font-weight: 800;
        }
        
        .hero-headline span {
            position: relative;
            display: inline-block;
        }
        
        .hero-headline span::after {
            content: '';
            position: absolute;
            bottom: 8px;
            left: 0;
            width: 100%;
            height: 12px;
            background-color: rgba(92, 106, 196, 0.2);
            z-index: -1;
        }
        
        .hero-description {
            font-size: 18px;
            color: #555;
            margin-bottom: 32px;
            max-width: 480px;
        }
        
        .btn {
            display: inline-block;
            padding: 14px 28px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: var(--accent);
            color: white;
            box-shadow: 0 4px 12px rgba(92, 106, 196, 0.25);
        }
        
        .btn-primary:hover {
            background-color: #4d5ab0;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(92, 106, 196, 0.3);
        }
        
        .btn-outline {
            border: 2px solid var(--accent);
            color: var(--accent);
            margin-left: 16px;
        }
        
        .btn-outline:hover {
            background-color: rgba(92, 106, 196, 0.1);
        }
        
        .hero-image {
            flex: 1;
            position: relative;
        }
        
        .hero-image img {
            width: 100%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        /* Partenaires */
        .partners {
            margin-top: 48px;
        }
        
        .partners-title {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #888;
            margin-bottom: 20px;
        }
        
        .partners-logos {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
            align-items: center;
        }
        
        .partners-logos svg {
            height: 24px;
            opacity: 0.6;
            transition: var(--transition);
        }
        
        .partners-logos svg:hover {
            opacity: 1;
        }
        
        /* Scroll button */
        .scroll-top {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            background-color: white;
            color: var(--accent);
            border: none;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            opacity: 0;
            pointer-events: none;
        }
        
        .scroll-top.visible {
            opacity: 1;
            pointer-events: all;
        }
        
        .scroll-top:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <header class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-headline">
                        Libérez votre <span>potentiel créatif</span>
                    </h1>
                    <p class="hero-description">
                        Transformation professionnelle par l'excellence personnelle. Dépassement de soi guidé par des experts.
                    </p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary">Commencer maintenant</a>
                        <a href="#services" class="btn btn-outline">Nos services</a>
                    </div>
                    
                    <div class="partners">
                        <p class="partners-title">Ils nous font confiance</p>
                        <div class="partners-logos">
                            <!-- Logos simples -->
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14h-2v-4H8v-2h2V9h2v2h2v2h-2v4z"/></svg>
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                        </div>
                    </div>
                </div>
                
                <div class="hero-image">
                    <img src="/api/placeholder/550/400" alt="Coaching professionnel" />
                </div>
            </div>
        </div>
    </header>
    
    <button id="scrollTopBtn" class="scroll-top">↑</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollTopBtn = document.getElementById('scrollTopBtn');

            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    scrollTopBtn.classList.add('visible');
                } else {
                    scrollTopBtn.classList.remove('visible');
                }
            });

            scrollTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>