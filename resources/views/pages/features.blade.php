<div id="features" class="relative w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
    <div class="container flex flex-col items-center justify-between h-full max-w-6xl mx-auto">
        <!-- Contenu initial (titre, sous-titre, bouton) -->
        <div id="initialContent">
            <h2 class="my-5 text-base font-medium tracking-tight text-indigo-500 uppercase">Test Gratuit</h2>
            <h6 class="max-w-2xl px-5 mt-2 text-3xl font-black leading-tight text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl">
                Passez un Test Gratuitement
            </h6>
            <br> <br> <br> <br> 
            <!-- Bouton pour démarrer le test -->
            <button id="startTestButton" class="animated-button">Passez le test maintenant</button>
        </div>
        
        <!-- Section du formulaire de quiz (cachée par défaut) -->
        <div id="quizForm" class="hidden">
            <div id="quiz">
                <!-- Les questions seront injectées ici par JavaScript -->
            </div>
        </div>
        
        <!-- Section du formulaire (cachée par défaut) -->
        <div id="emailSection" class="hidden">
            <p>Veuillez remplir ce formulaire pour recevoir votre bilan personnalisé</p> <br>
            <form id="userForm">
                <!-- Prénom -->
                <div class="form-group">
                    <label for="fname">Prénom</label>
                    <input type="text" id="fname" name="fname" placeholder="Entrez votre prénom" required>
                </div>
                <!-- Nom -->
                <div class="form-group">
                    <label for="lname">Nom</label>
                    <input type="text" id="lname" name="lname" placeholder="Entrez votre nom" required>
                </div>
                <!-- Téléphone -->
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" required>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
                <!-- Bouton de soumission -->
                <button type="submit" id="submitForm" class="animated-button">Recevoir mon bilan</button>
            </form>
        </div>
        
        <!-- Section des résultats (cachée par défaut) -->
        <div id="resultsSection" class="hidden result-container">
            <div class="result-header">
                <h2>Résultats : Votre Accompagnement Idéal</h2>
            </div>
            <div class="result-body">
                <div class="result-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h1 id="resultsText" class="result-title"></h1>
                <div class="result-description">
                    <ul id="resultsDetails" class="result-list"></ul>
                </div>
            </div>
            <div class="result-footer">
                <button id="restartButton" class="animated-button">Recommencer le test</button>
            </div>
        </div>
        <br>
        <!-- Message de résultat pour A et B (caché par défaut) -->
        <div id="resultMessage" class="hidden success-alert">
            <div class="alert-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="alert-content">
                Merci d'avoir complété le test ! Votre bilan personnalisé vous a été envoyé par email. Pensez à vérifier vos spams si vous ne le recevez pas dans quelques minutes.
            </div>
            <div class="alert-close">
                <i class="fas fa-times"></i>
            </div>
        </div>

        <!-- Message de résultat pour C, D et E (caché par défaut) -->
        <div id="noEmailResultMessage" class="hidden success-alert">
            <div class="alert-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="alert-content">
                Merci d'avoir complété le test ! Votre bilan personnalisé s'affiche ci-dessus.
            </div>
            <div class="alert-close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
</div>