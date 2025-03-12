<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du Stress et de la Confiance</title>
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/stress-hero.jpg');
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
            <h1 class="text-4xl font-bold mb-4">Maîtrisez Votre Stress et Renforcez Votre Confiance</h1>
            <p class="text-xl mb-8">Des stratégies efficaces pour transformer vos défis en opportunités de croissance</p>
            <a href="#contact" class="btn-primary inline-block">Retrouvez Votre Sérénité</a>
        </div>
    </div>

    <div class="content-container">
        <!-- Introduction Section with Image -->
        <section class="py-10 flex flex-col md:flex-row items-center mb-10 bg-white p-8 rounded-lg shadow-md">
            <div class="md:w-1/2 mb-6 md:mb-0 md:pr-8">
                <img src="/images/stress-coaching.jpg" alt="Gestion du stress et coaching en confiance" class="rounded-lg shadow-lg">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-semibold text-primary mb-4">Développez Votre Résilience et Votre Assurance</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Le stress fait partie intégrante de notre vie quotidienne. Qu'il s'agisse de pressions professionnelles, d'obligations familiales ou d'attentes personnelles, nous sommes constamment confrontés à des situations qui peuvent ébranler notre confiance et générer du stress. Notre approche vous aide à transformer ces défis en opportunités de croissance, à cultiver une confiance authentique et à développer des stratégies durables pour gérer efficacement le stress.
                </p>
            </div>
        </section>

        <!-- Services in Cards -->
        <section class="py-10">
            <h2 class="text-3xl font-semibold text-primary mb-8 text-center">Nos Programmes de Gestion du Stress</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Stress Management Card -->
                <div class="card bg-white p-8">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-brain"></i></span>
                        <h3 class="text-2xl font-semibold text-primary">Gestion du Stress</h3>
                    </div>
                    <p class="text-gray-700 mb-6">
                        Apprenez à identifier, comprendre et maîtriser vos réactions au stress pour retrouver équilibre et sérénité.
                    </p>
                    <ul class="list-disc pl-6 text-lg text-gray-700 mb-6">
                        <li>Techniques de respiration et relaxation</li>
                        <li>Pleine conscience et méditation</li>
                        <li>Restructuration cognitive</li>
                        <li>Gestion du temps et des priorités</li>
                        <li>Hygiène de vie et équilibre personnel</li>
                    </ul>
                    <img src="/images/stress-management.jpg" alt="Gestion du stress" class="w-full rounded-lg mb-4">
                </div>

                <!-- Confidence Building Card -->
                <div class="card bg-white p-8">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-mountain"></i></span>
                        <h3 class="text-2xl font-semibold text-primary">Renforcement de la Confiance</h3>
                    </div>
                    <p class="text-gray-700 mb-6">
                        Développez une confiance authentique et durable pour atteindre vos objectifs et vous affirmer pleinement.
                    </p>
                    <ul class="list-disc pl-6 text-lg text-gray-700 mb-6">
                        <li>Identification de vos forces et qualités</li>
                        <li>Dépassement des croyances limitantes</li>
                        <li>Techniques d'affirmation de soi</li>
                        <li>Gestion de l'anxiété sociale</li>
                        <li>Pratique de l'auto-compassion</li>
                    </ul>
                    <img src="/images/confidence-building.jpg" alt="Renforcement de la confiance"
                        class="w-full rounded-lg mb-4">

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-lg font-semibold text-primary">Ateliers Pratiques</p>
                            <p class="text-gray-700">Sessions interactives avec outils concrets à appliquer au quotidien.</p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <p class="text-lg font-semibold text-primary">Coaching Individuel</p>
                            <p class="text-gray-700">Accompagnement personnalisé pour des résultats profonds et durables.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stress and Confidence Benefits Section -->
        <section class="py-10 bg-white rounded-lg shadow-md p-8 mb-12">
            <h2 class="text-2xl font-semibold text-primary mb-6">Comprendre et Gérer le Stress: La Clé d'une Confiance Inébranlable</h2>
            <div class="flex flex-col md:flex-row items-center mb-8">
                <div class="md:w-1/3 mb-6 md:mb-0">
                    <img src="/images/stress-confidence.jpg" alt="Gestion du stress et développement de la confiance"
                        class="shadow-lg mx-auto">
                </div>
                <div class="md:w-2/3 md:pl-8">
                    <p class="text-lg text-gray-700 mb-4">
                        Le stress est une réaction physiologique et psychologique face à une situation perçue comme menaçante ou exigeante. Lorsqu'il devient chronique, il peut considérablement affecter notre confiance en soi et notre bien-être général. Notre approche combine des techniques scientifiquement prouvées et des pratiques ancestrales pour vous aider à développer une relation plus saine avec le stress et à cultiver une confiance authentique qui reste stable même dans les moments difficiles.
                    </p>

                    <!-- Testimonial -->
                    <div class="testimonial bg-blue-50 p-4 rounded-lg">
                        <p class="italic text-gray-700 mb-2">"Les outils de gestion du stress que j'ai appris dans ce programme ont complètement transformé ma vie professionnelle et personnelle. J'ai retrouvé ma confiance et je me sens enfin capable d'affronter les défis avec sérénité et assurance."</p>
                        <p class="font-semibold text-right">— Sophie L., Responsable Marketing</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-heartbeat"></i></span>
                        <p class="text-lg font-semibold text-primary">Comprendre les mécanismes du stress</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Identifier les différents types de stress (aigu, chronique, eustress, détresse).</li>
                        <li>Reconnaître vos déclencheurs personnels et vos schémas de réaction.</li>
                        <li>Comprendre l'impact du stress sur votre corps, votre mental et vos émotions.</li>
                    </ul>
                </div>
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-wind"></i></span>
                        <p class="text-lg font-semibold text-primary">Techniques de respiration et relaxation</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Maîtriser la respiration diaphragmatique pour calmer le système nerveux.</li>
                        <li>Pratiquer la relaxation musculaire progressive pour libérer les tensions.</li>
                        <li>Intégrer des micro-pratiques de détente dans votre quotidien chargé.</li>
                    </ul>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-brain"></i></span>
                        <p class="text-lg font-semibold text-primary">Pleine conscience et méditation</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Développer votre capacité à rester ancré dans le moment présent.</li>
                        <li>Observer vos pensées sans jugement pour réduire les ruminations anxieuses.</li>
                        <li>Créer un espace entre les stimuli et vos réactions pour des choix plus conscients.</li>
                    </ul>
                </div>
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-balance-scale"></i></span>
                        <p class="text-lg font-semibold text-primary">Équilibre de vie et prévention</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Optimiser votre sommeil, alimentation et activité physique pour plus de résilience.</li>
                        <li>Établir des limites saines dans vos relations professionnelles et personnelles.</li>
                        <li>Développer des rituels quotidiens pour prévenir l'accumulation de stress.</li>
                    </ul>
                </div>
            </div>

            <div class="card bg-gray-50 p-6 mt-8">
                <div class="flex items-center mb-4">
                    <span class="icon-feature mr-4"><i class="fas fa-seedling"></i></span>
                    <p class="text-lg font-semibold text-primary">Cultiver une confiance authentique</p>
                </div>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>Identifier et restructurer vos croyances limitantes sur vous-même.</li>
                    <li>Développer une mentalité de croissance face aux défis et aux échecs.</li>
                    <li>Pratiquer l'auto-compassion et la bienveillance envers vous-même.</li>
                    <li>Sortir progressivement de votre zone de confort pour renforcer votre assurance.</li>
                </ul>
            </div>
        </section>

        <!-- Free Assessment Section with Image -->
        <section id="contact" class="py-10 bg-blue-50 rounded-lg shadow-md p-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-6 md:mb-0 md:pr-8">
                    <h2 class="text-2xl font-semibold text-primary mb-4">Évaluation Gratuite de Votre Niveau de Stress</h2>
                    <p class="text-lg text-gray-700 mb-6">
                        Vous souhaitez mieux comprendre votre relation au stress et identifier vos besoins spécifiques? Commencez par notre évaluation gratuite qui vous aidera à mesurer votre niveau actuel de stress et à déterminer les ressources dont vous avez besoin pour retrouver sérénité et confiance.
                    </p>
                    <form action="#" method="POST" class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="mb-4">
                            <label for="name" class="block text-lg font-semibold text-primary mb-2">Votre
                                nom</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-lg font-semibold text-primary mb-2">Votre
                                email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="stress_level" class="block text-lg font-semibold text-primary mb-2">Votre niveau de stress actuel</label>
                            <select id="stress_level" name="stress_level"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Sélectionnez votre niveau</option>
                                <option value="low">Léger - Occasionnel</option>
                                <option value="moderate">Modéré - Fréquent</option>
                                <option value="high">Élevé - Constant</option>
                                <option value="severe">Sévère - Envahissant</option>
                                <option value="burnout">Proche de l'épuisement</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="concern" class="block text-lg font-semibold text-primary mb-2">Votre principale préoccupation</label>
                            <select id="concern" name="concern"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Choisissez une préoccupation</option>
                                <option value="work">Stress professionnel</option>
                                <option value="relationships">Relations interpersonnelles</option>
                                <option value="confidence">Manque de confiance en soi</option>
                                <option value="anxiety">Anxiété et inquiétudes</option>
                                <option value="balance">Équilibre vie pro/perso</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn-primary w-full">Recevoir mon évaluation
                                personnalisée</button>
                        </div>
                    </form>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/stress-assessment.jpg" alt="Évaluation du stress"
                        class="rounded-lg shadow-lg">
                </div>
            </div>
        </section>
    </div>
    @include('layouts.footer')
</body>

</html>
