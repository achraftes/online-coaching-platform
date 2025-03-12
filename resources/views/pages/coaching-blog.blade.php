<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaching Individuel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .content-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .text-primary {
            color: #2d3748;
        }
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/coaching-coach-development.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            border-radius: 10px;
            margin-bottom: 40px;
        }
        .card {
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card img {
            height: 300px;
            object-fit: cover;
            width: 100%;
            border-radius: 10px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .icon-feature {
            display: inline-block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            background-color: #ebf4ff;
            color: #3182ce;
            border-radius: 50%;
            margin-bottom: 10px;
            font-size: 20px;
        }
        .btn-primary {
            background-color: #3182ce;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2c5282;
        }
        .testimonial {
            border-left: 4px solid #3182ce;
            padding-left: 20px;
        }
    </style>
</head>
@include('layouts.header')
<body class="bg-white">
    <!-- Hero Section with Background Image -->
    <div class="hero-section">
        <div class="content-container text-center">
            <h1 class="text-4xl font-bold mb-4">Transformez Votre Vie avec un Coaching Sur-Mesure</h1>
            <p class="text-xl mb-8">Un accompagnement personnalisé pour révéler votre plein potentiel</p>
            <a href="#contact" class="btn-primary inline-block">Commencer votre Transformation</a>
        </div>
    </div>

    <div class="content-container">
        <!-- Introduction Section with Image -->
        <section class="py-10 flex flex-col md:flex-row items-center mb-10 bg-white p-8 rounded-lg shadow-md">
            <div class="md:w-1/2 mb-6 md:mb-0 md:pr-8">
                <img src="/images/Coach en consultation.jpg" alt="Coach en consultation" class="rounded-lg shadow-lg">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-semibold text-primary mb-4">Transformez votre Vie avec un Coaching Sur-Mesure</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Que vous soyez en quête d'épanouissement personnel ou d'évolution professionnelle, le coaching est un levier puissant pour atteindre vos objectifs. Grâce à un accompagnement structuré et personnalisé, je vous aide à dépasser vos blocages, à révéler votre potentiel et à prendre des décisions alignées avec vos aspirations.
                </p>
            </div>
        </section>

        <!-- Services in Cards -->
        <section class="py-10">
            <h2 class="text-3xl font-semibold text-primary mb-8 text-center">Nos Services de Coaching</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Personal Coaching Card -->
                <div class="card bg-white p-8">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-heart"></i></span>
                        <h3 class="text-2xl font-semibold text-primary">Coaching Personnel</h3>
                    </div>
                    <p class="text-gray-700 mb-6">
                        Reprenez le contrôle de votre vie avec un accompagnement personnalisé pour développer votre confiance et gérer vos émotions.
                    </p>
                    <ul class="list-disc pl-6 text-lg text-gray-700 mb-6">
                        <li>Amélioration de la confiance en soi</li>
                        <li>Gestion du stress et des émotions</li>
                        <li>Équilibre entre vie personnelle et professionnelle</li>
                        <li>Développement de la motivation et de la discipline</li>
                        <li>Surmonter un changement, une période difficile</li>
                    </ul>
                    <img src="/images/Coaching personnel.jpg" alt="Coaching personnel" class="w-full rounded-lg mb-4">
                </div>

                <!-- Professional Coaching Card -->
                <div class="card bg-white p-8">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-briefcase"></i></span>
                        <h3 class="text-2xl font-semibold text-primary">Coaching Professionnel</h3>
                    </div>
                    <p class="text-gray-700 mb-6">
                        Faites évoluer votre carrière avec un coaching adapté à vos ambitions professionnelles.
                    </p>
                    <ul class="list-disc pl-6 text-lg text-gray-700 mb-6">
                        <li>Développement professionnel</li>
                        <li>Reconversion professionnelle</li>
                        <li>Accompagnement à l'entrepreneuriat</li>
                    </ul>
                    <img src="/images/Coaching professionnel.jpg" alt="Coaching professionnel" class="w-full rounded-lg mb-4">

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-lg font-semibold text-primary">Pack Standard</p>
                            <p class="text-gray-700">Accompagnement de base pour un coaching efficace et personnalisé.</p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <p class="text-lg font-semibold text-primary">Pack Premium</p>
                            <p class="text-gray-700">Coaching intensif avec suivi régulier et plus de ressources.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Personal Coaching Benefits Section -->
        <section class="py-10 bg-white rounded-lg shadow-md p-8 mb-12">
            <h2 class="text-2xl font-semibold text-primary mb-6">Coaching Personnel: Reprenez le Contrôle de Votre Vie</h2>
            <div class="flex flex-col md:flex-row items-center mb-8">
                <div class="md:w-1/3 mb-6 md:mb-0">
                    <img src="/images/Développement personnel.jpg" alt="Développement personnel" class="shadow-lg mx-auto">
                </div>
                <div class="md:w-2/3 md:pl-8">
                    <p class="text-lg text-gray-700 mb-4">
                        Vous traversez une période de doute ? Vous souhaitez retrouver confiance en vous, améliorer votre gestion du stress ou atteindre un équilibre de vie plus harmonieux ? Le coaching personnel vous offre un espace bienveillant pour travailler sur vos croyances limitantes, développer votre mindset et avancer avec sérénité vers une vie plus alignée avec vos valeurs.
                    </p>

                    <!-- Testimonial -->
                    <div class="testimonial bg-blue-50 p-4 rounded-lg">
                        <p class="italic text-gray-700 mb-2">"Le coaching m'a permis de me reconnecter à mes valeurs et de surmonter mes doutes. Je me sens aujourd'hui plus confiant et aligné dans mes choix de vie."</p>
                        <p class="font-semibold text-right">— Marie L.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-star"></i></span>
                        <p class="text-lg font-semibold text-primary">Confiance en soi et estime de soi</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Dépasser les croyances limitantes et le syndrome de l'imposteur.</li>
                        <li>Renforcer son assurance et son image de soi.</li>
                        <li>Apprendre à s'affirmer et à poser des limites.</li>
                    </ul>
                </div>
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-brain"></i></span>
                        <p class="text-lg font-semibold text-primary">Gestion des émotions et du stress</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Apprendre à mieux gérer le stress et l'anxiété au quotidien.</li>
                        <li>Identifier les sources de tension et y apporter des solutions.</li>
                        <li>Développer une intelligence émotionnelle et une meilleure régulation émotionnelle.</li>
                    </ul>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-balance-scale"></i></span>
                        <p class="text-lg font-semibold text-primary">Équilibre de vie et bien-être personnel</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Trouver un équilibre entre vie personnelle et professionnelle.</li>
                        <li>Apprendre à mieux gérer son temps et ses priorités.</li>
                        <li>Mettre en place des routines et habitudes favorisant le bien-être mental et physique.</li>
                    </ul>
                </div>
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-bolt"></i></span>
                        <p class="text-lg font-semibold text-primary">Motivation et développement de la discipline</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Retrouver l'envie et la motivation pour atteindre ses objectifs.</li>
                        <li>Sortir de la procrastination et adopter des habitudes productives.</li>
                        <li>Apprendre à rester discipliné(e) et organisé(e) sur le long terme.</li>
                    </ul>
                </div>
            </div>

            <div class="card bg-gray-50 p-6 mt-8">
                <div class="flex items-center mb-4">
                    <span class="icon-feature mr-4"><i class="fas fa-arrows-alt"></i></span>
                    <p class="text-lg font-semibold text-primary">Accompagnement lors des périodes de transition</p>
                </div>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>Surmonter une séparation, une perte ou un changement de vie.</li>
                    <li>Faire face à une reconversion personnelle ou professionnelle.</li>
                    <li>Apprendre à s'adapter et à rebondir après une période difficile.</li>
                </ul>
            </div>
        </section>

        <!-- Free Test Section with Image -->
        <section id="contact" class="py-10 bg-blue-50 rounded-lg shadow-md p-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-6 md:mb-0 md:pr-8">
                    <h2 class="text-2xl font-semibold text-primary mb-4">Test Gratuit</h2>
                    <p class="text-lg text-gray-700 mb-6">
                        Vous souhaitez améliorer votre bien-être, renforcer votre confiance en vous ou mieux gérer votre stress, mais vous ne savez pas par où commencer ? Ce test rapide vous aidera à identifier l'accompagnement qui correspond le mieux à vos besoins.
                    </p>
                    <form action="#" method="POST" class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="mb-4">
                            <label for="name" class="block text-lg font-semibold text-primary mb-2">Votre nom</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-lg font-semibold text-primary mb-2">Votre email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="goal" class="block text-lg font-semibold text-primary mb-2">Votre objectif principal</label>
                            <select id="goal" name="goal" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Choisissez un objectif</option>
                                <option value="confidence">Améliorer ma confiance en moi</option>
                                <option value="stress">Mieux gérer mon stress</option>
                                <option value="balance">Trouver un meilleur équilibre de vie</option>
                                <option value="career">Évoluer professionnellement</option>
                                <option value="transition">Gérer une transition de vie</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn-primary w-full">Recevoir mon bilan personnalisé</button>
                        </div>
                    </form>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/Consultation de coaching.jpg" alt="Consultation de coaching" class="rounded-lg shadow-lg">
                </div>
            </div>
        </section>


    </div>
    @include('layouts.footer')
</body>
</html>
