<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Développement du Leadership</title>
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/leadership-hero.jpg');
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
            <h1 class="text-4xl font-bold mb-4">Développez Vos Compétences de Leadership</h1>
            <p class="text-xl mb-8">Devenez le leader inspirant et efficace que votre équipe mérite</p>
            <a href="#contact" class="btn-primary inline-block">Boostez Votre Leadership</a>
        </div>
    </div>

    <div class="content-container">
        <!-- Introduction Section with Image -->
        <section class="py-10 flex flex-col md:flex-row items-center mb-10 bg-white p-8 rounded-lg shadow-md">
            <div class="md:w-1/2 mb-6 md:mb-0 md:pr-8">
                <img src="/images/leadership-coaching.jpg" alt="Coaching en leadership" class="rounded-lg shadow-lg">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-semibold text-primary mb-4">Développez Votre Potentiel de Leadership</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Que vous soyez un dirigeant expérimenté ou un manager en devenir, le développement du leadership est
                    essentiel pour inspirer vos équipes et atteindre l'excellence. Notre programme sur mesure vous aide
                    à cultiver vos compétences de leader, à affiner votre vision stratégique et à créer un environnement
                    de travail où chacun peut s'épanouir et exceller.
                </p>
            </div>
        </section>

        <!-- Services in Cards -->
        <section class="py-10">
            <h2 class="text-3xl font-semibold text-primary mb-8 text-center">Nos Programmes de Leadership</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Leadership Skills Card -->
                <div class="card bg-white p-8">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-users"></i></span>
                        <h3 class="text-2xl font-semibold text-primary">Leadership d'Équipe</h3>
                    </div>
                    <p class="text-gray-700 mb-6">
                        Apprenez à motiver, diriger et développer votre équipe pour atteindre des performances
                        exceptionnelles.
                    </p>
                    <ul class="list-disc pl-6 text-lg text-gray-700 mb-6">
                        <li>Communication efficace et inspirante</li>
                        <li>Gestion des conflits et résolution de problèmes</li>
                        <li>Délégation et responsabilisation</li>
                        <li>Développement du potentiel des collaborateurs</li>
                        <li>Conduite du changement et innovation</li>
                    </ul>
                    <img src="/images/team-leadership.jpg" alt="Leadership d'équipe" class="w-full rounded-lg mb-4">
                </div>

                <!-- Strategic Leadership Card -->
                <div class="card bg-white p-8">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-chess"></i></span>
                        <h3 class="text-2xl font-semibold text-primary">Leadership Stratégique</h3>
                    </div>
                    <p class="text-gray-700 mb-6">
                        Développez votre vision et vos compétences stratégiques pour guider votre organisation vers le
                        succès.
                    </p>
                    <ul class="list-disc pl-6 text-lg text-gray-700 mb-6">
                        <li>Vision stratégique et prise de décision</li>
                        <li>Pensée analytique et résolution de problèmes complexes</li>
                        <li>Gestion du changement organisationnel</li>
                    </ul>
                    <img src="/images/strategic-leadership.jpg" alt="Leadership stratégique"
                        class="w-full rounded-lg mb-4">

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-lg font-semibold text-primary">Formation Intensive</p>
                            <p class="text-gray-700">Programme complet avec coaching personnalisé et outils pratiques.
                            </p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <p class="text-lg font-semibold text-primary">Accompagnement Premium</p>
                            <p class="text-gray-700">Suivi à long terme avec évaluations et sessions de feedback.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Leadership Development Benefits Section -->
        <section class="py-10 bg-white rounded-lg shadow-md p-8 mb-12">
            <h2 class="text-2xl font-semibold text-primary mb-6">Développement du Leadership: Devenez un Leader
                Inspirant</h2>
            <div class="flex flex-col md:flex-row items-center mb-8">
                <div class="md:w-1/3 mb-6 md:mb-0">
                    <img src="/images/leadership-development.jpg" alt="Développement du leadership"
                        class="shadow-lg mx-auto">
                </div>
                <div class="md:w-2/3 md:pl-8">
                    <p class="text-lg text-gray-700 mb-4">
                        Le leadership ne se limite pas à une position hiérarchique. C'est une posture, un ensemble de
                        compétences et de qualités personnelles qui vous permettent d'influencer positivement votre
                        entourage. Notre approche du développement du leadership combine théorie, pratique et réflexion
                        personnelle pour vous aider à devenir le leader authentique et efficace que vous aspirez à être.
                    </p>

                    <!-- Testimonial -->
                    <div class="testimonial bg-blue-50 p-4 rounded-lg">
                        <p class="italic text-gray-700 mb-2">"Ce programme de développement du leadership a transformé
                            ma façon de diriger mon équipe. J'ai acquis des outils concrets et une nouvelle confiance
                            qui ont eu un impact immédiat sur nos résultats et l'atmosphère de travail."</p>
                        <p class="font-semibold text-right">— Thomas D., Directeur Commercial</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-comments"></i></span>
                        <p class="text-lg font-semibold text-primary">Communication et influence</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Maîtriser l'art de la communication persuasive et inspirante.</li>
                        <li>Développer votre présence et votre charisme de leader.</li>
                        <li>Adapter votre style de communication à différents interlocuteurs.</li>
                    </ul>
                </div>
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-lightbulb"></i></span>
                        <p class="text-lg font-semibold text-primary">Innovation et agilité</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Cultiver un état d'esprit d'innovation et d'amélioration continue.</li>
                        <li>Favoriser la créativité et l'initiative au sein de votre équipe.</li>
                        <li>Développer l'agilité organisationnelle face aux changements.</li>
                    </ul>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-hands-helping"></i></span>
                        <p class="text-lg font-semibold text-primary">Intelligence émotionnelle et empathie</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Renforcer votre conscience de soi et votre gestion émotionnelle.</li>
                        <li>Développer l'empathie et la compréhension des besoins de vos collaborateurs.</li>
                        <li>Créer un environnement psychologiquement sécurisant pour votre équipe.</li>
                    </ul>
                </div>
                <div class="card bg-gray-50 p-6">
                    <div class="flex items-center mb-4">
                        <span class="icon-feature mr-4"><i class="fas fa-tasks"></i></span>
                        <p class="text-lg font-semibold text-primary">Gestion et performance</p>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700">
                        <li>Fixer des objectifs clairs et motivants pour votre équipe.</li>
                        <li>Mettre en place des systèmes efficaces de suivi et de feedback.</li>
                        <li>Optimiser les performances individuelles et collectives.</li>
                    </ul>
                </div>
            </div>

            <div class="card bg-gray-50 p-6 mt-8">
                <div class="flex items-center mb-4">
                    <span class="icon-feature mr-4"><i class="fas fa-compass"></i></span>
                    <p class="text-lg font-semibold text-primary">Leadership authentique et éthique</p>
                </div>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>Développer votre leadership fondé sur vos valeurs et votre authenticité.</li>
                    <li>Instaurer une culture d'éthique et de responsabilité.</li>
                    <li>Bâtir une réputation de leader intègre et inspirant.</li>
                </ul>
            </div>
        </section>

        <!-- Free Assessment Section with Image -->
        <section id="contact" class="py-10 bg-blue-50 rounded-lg shadow-md p-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-6 md:mb-0 md:pr-8">
                    <h2 class="text-2xl font-semibold text-primary mb-4">Évaluation de Leadership Gratuite</h2>
                    <p class="text-lg text-gray-700 mb-6">
                        Vous souhaitez identifier vos forces de leadership et vos axes d'amélioration? Commencez par
                        notre évaluation gratuite qui vous aidera à mieux comprendre votre style de leadership actuel et
                        les compétences à développer pour atteindre l'excellence.
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
                            <label for="position" class="block text-lg font-semibold text-primary mb-2">Votre position
                                actuelle</label>
                            <select id="position" name="position"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Sélectionnez votre position</option>
                                <option value="manager">Manager d'équipe</option>
                                <option value="director">Directeur de département</option>
                                <option value="executive">Cadre dirigeant / Executif</option>
                                <option value="entrepreneur">Entrepreneur / Fondateur</option>
                                <option value="potential">Manager en devenir</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="challenge" class="block text-lg font-semibold text-primary mb-2">Votre
                                principal défi de leadership</label>
                            <select id="challenge" name="challenge"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Choisissez un défi</option>
                                <option value="communication">Communication et influence</option>
                                <option value="management">Gestion d'équipe</option>
                                <option value="vision">Vision stratégique</option>
                                <option value="change">Conduite du changement</option>
                                <option value="conflict">Gestion des conflits</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn-primary w-full">Recevoir mon évaluation
                                personnalisée</button>
                        </div>
                    </form>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/leadership-assessment.jpg" alt="Évaluation du leadership"
                        class="rounded-lg shadow-lg">
                </div>
            </div>
        </section>
    </div>
    @include('layouts.footer')
</body>

</html>
