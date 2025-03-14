 // Code existant pour la navigation mobile
 if (document.getElementById('nav-mobile-btn')) {
    document.getElementById('nav-mobile-btn').addEventListener('click', function() {
        if (this.classList.contains('close')) {
            document.getElementById('nav').classList.add('hidden');
            this.classList.remove('close');
        } else {
            document.getElementById('nav').classList.remove('hidden');
            this.classList.add('close');
        }
    });
}

// Gestion de la modal
const modal = document.getElementById('inscriptionModal');
const selectPlanBtns = document.querySelectorAll('.select-plan-btn');
const closeBtn = document.querySelector('.close-button');
const form = document.getElementById('inscriptionForm');
const successMessage = document.getElementById('successMessage');

function showModal() {
    modal.style.display = 'block';
    setTimeout(() => modal.classList.add('show'), 10);
    document.body.style.overflow = 'hidden';
}

function hideModal() {
    modal.classList.remove('show');
    setTimeout(() => {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }, 300);
}

function showSuccess() {
    successMessage.style.display = 'block';
    setTimeout(() => successMessage.style.display = 'none', 3000);
}

function clearErrors() {
    document.querySelectorAll('.error-text').forEach(error => {
        error.style.display = 'none';
        error.textContent = '';
    });
}

function showError(field, message) {
    const error = document.querySelector(`[data-error="${field}"]`);
    if (error) {
        error.textContent = message;
        error.style.display = 'block';
    }
}

// Ajouter l'événement click à tous les boutons
selectPlanBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        showModal();
    });
});

closeBtn.addEventListener('click', hideModal);
modal.addEventListener('click', (e) => {
    if (e.target === modal) hideModal();
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') hideModal();
});

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    clearErrors();

    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    try {
        const response = await fetch('/clients', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (response.ok) {
            hideModal();
            form.reset();
            showSuccess();
            showPaymentModal(data); // Afficher la modal de paiement après l'inscription réussie
        } else if (response.status === 422 && result.errors) {
            Object.entries(result.errors).forEach(([field, [message]]) => {
                showError(field, message);
            });
        } else {
            throw new Error(result.message || 'Une erreur est survenue');
        }
    } catch (error) {
        console.error('Erreur:', error);
        alert(error.message || 'Une erreur est survenue. Veuillez réessayer.');
    }
});

const paymentModal = document.getElementById('paymentModal');
const servicePrices = {
    'starter': 'CA$550.00',
    'professional': 'CA$750.00',
    'enterprise': 'CA$950.00'
};

const serviceNames = {
    'starter': 'Starter',
    'professional': 'Professional',
    'enterprise': 'Enterprise'
};

function showPaymentModal(serviceData) {
    // Mettre à jour le récapitulatif
    document.getElementById('summary-service').textContent = serviceNames[serviceData.service];
    document.getElementById('summary-price').textContent = servicePrices[serviceData.service];
    document.getElementById('summary-total').textContent = servicePrices[serviceData.service];

    // Afficher la modal de paiement
    paymentModal.style.display = 'block';
    setTimeout(() => paymentModal.classList.add('show'), 10);
}

function hidePaymentModal() {
    paymentModal.classList.remove('show');
    setTimeout(() => {
        paymentModal.style.display = 'none';
    }, 300);
}

function processPayment() {
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');

    if (!paymentMethod) {
        alert('Veuillez sélectionner un mode de paiement');
        return;
    }

    // Ici vous pouvez ajouter la logique de traitement du paiement
    alert('Paiement confirmé ! Vous recevrez un email de confirmation.');
    hidePaymentModal();
}


 // ========================== Quiz Coaching ==========================
// Ce script gère un quiz interactif permettant aux utilisateurs de répondre 
// à une série de questions pour déterminer le type de coaching qui leur convient.

// Définition des questions et des options pour chaque question
// Définition des questions du quiz
const questions = [
    {
        question: "1. Comment vous sentez-vous actuellement dans votre vie personnelle ?",
        options: [
            "a) Je manque de confiance en moi et j'ai du mal à m'affirmer.",
            "b) Je me sens souvent stressé(e) et j'ai du mal à gérer mes émotions.",
            "c) J'ai l'impression de manquer d'équilibre entre mon travail et ma vie personnelle.",
            "d) J'ai du mal à rester motivé(e) et à atteindre mes objectifs.",
            "e) Je traverse une période difficile et je ne sais pas comment avancer."
        ]
    },
    {
        question: "2. Quel est votre principal défi en ce moment ?",
        options: [
            "a) Oser prendre la parole et croire en moi.",
            "b) Apprendre à mieux gérer mon stress et mes émotions.",
            "c) M'organiser et ne plus me sentir débordé(e).",
            "d) Arrêter de procrastiner et passer à l'action.",
            "e) Retrouver de la stabilité après un changement important."
        ]
    },
    {
        question: "3. Qu'est-ce qui vous empêcherait d'avancer aujourd'hui ?",
        options: [
            "a) Le regard des autres et mes propres doutes.",
            "b) Mon anxiété et mes pensées négatives.",
            "c) Le manque de temps et de priorités claires.",
            "d) Mon manque de discipline et de persévérance.",
            "e) Une situation personnelle ou professionnelle instable."
        ]
    },
    {
        question: "4. Quel objectif aimeriez-vous atteindre grâce au coaching ?",
        options: [
            "a) Avoir plus de confiance et d'assurance.",
            "b) Être plus serein(e) et gérer mes émotions avec calme.",
            "c) Trouver un équilibre de vie plus harmonieux.",
            "d) Apprendre à rester motivé(e) et discipliné(e).",
            "e) Rebondir et trouver un nouveau départ après une épreuve."
        ]
    }
];

// Variables pour suivre la question actuelle, les réponses et le résultat global
let currentQuestion = 0;
let answers = [];
let resultKeyGlobal = '';

// Fonction pour initialiser les boutons de fermeture des alertes
function initializeAlertCloseButtons() {
    const closeButtons = document.querySelectorAll('.alert-close');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const alert = this.closest('.success-alert');
            alert.classList.add('hidden');
        });
    });
}

// Initialiser les boutons de fermeture après le chargement du DOM
document.addEventListener('DOMContentLoaded', initializeAlertCloseButtons);

// Écouteur d'événement pour démarrer le test
document.getElementById('startTestButton').addEventListener('click', () => {
    document.getElementById('initialContent').classList.add('hidden');
    document.getElementById('quizForm').classList.remove('hidden');
    displayQuestion();
});

// Fonction pour afficher la question actuelle
function displayQuestion() {
    const quizElement = document.getElementById('quiz');
    quizElement.innerHTML = '';

    const questionElement = document.createElement('div');
    questionElement.className = 'question';

    questionElement.innerHTML = `<h2>${questions[currentQuestion].question}</h2>`;

    // Création des options de réponse
    questions[currentQuestion].options.forEach((option, index) => {
        const optionElement = document.createElement('div');
        optionElement.className = 'option-block';
        optionElement.innerHTML = `
            <input type="radio" id="option${index}" name="question" value="${String.fromCharCode(65 + index)}">
            <label for="option${index}">${option}</label>
        `;
        optionElement.addEventListener('click', () => {
            const selectedOption = document.querySelector('input[name="question"]:checked');
            if (selectedOption) {
                selectedOption.checked = false;
            }
            const input = optionElement.querySelector('input[type="radio"]');
            input.checked = true;
        });
        questionElement.appendChild(optionElement);
    });

    // Création des boutons de navigation
    const buttonContainer = document.createElement('div');
    buttonContainer.className = 'button-container';

    const prevButton = document.createElement('button');
    prevButton.id = 'prevButton';
    prevButton.innerHTML = '<i class="fas fa-arrow-left"></i>';
    prevButton.addEventListener('click', prevQuestion);
    buttonContainer.appendChild(prevButton);

    const nextButton = document.createElement('button');
    nextButton.id = 'nextButton';
    nextButton.innerText = 'Suivant';
    nextButton.addEventListener('click', nextQuestion);
    buttonContainer.appendChild(nextButton);

    questionElement.appendChild(buttonContainer);
    quizElement.appendChild(questionElement);

    // Masquer le bouton précédent sur la première question
    if (currentQuestion === 0) {
        prevButton.style.display = 'none';
    }
}

// Fonction pour revenir à la question précédente
function prevQuestion() {
    if (currentQuestion > 0) {
        currentQuestion--;
        displayQuestion();
    }
}

// Fonction pour passer à la question suivante
function nextQuestion() {
    const selectedOption = document.querySelector('input[name="question"]:checked');
    if (selectedOption) {
        answers.push(selectedOption.value);
        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            displayQuestion();
        } else {
            // Calcul du résultat
            const result = calculateResult();
            resultKeyGlobal = result.resultKey;

            // Afficher la section email pour tous les résultats
            showEmailSection();
        }
    } else {
        alert("Veuillez sélectionner une option avant de continuer.");
    }
}

// Fonction pour afficher la section email
function showEmailSection() {
    document.getElementById('quizForm').classList.add('hidden');
    document.getElementById('emailSection').classList.remove('hidden');
}

// Fonction pour afficher les résultats sans email
function showResultsWithoutEmail(result) {
    document.getElementById('quizForm').classList.add('hidden');
    document.getElementById('resultsSection').classList.remove('hidden');

    const resultsText = document.getElementById('resultsText');
    const resultsDetails = document.getElementById('resultsDetails');

    resultsText.innerText = `Votre accompagnement idéal : ${result.title}`;
    resultsDetails.innerHTML = `<li>${result.description}</li>`;

    // Pour les résultats C, D et E, afficher le message sans email
    document.getElementById('noEmailResultMessage').classList.remove('hidden');
    document.getElementById('noEmailResultMessage').scrollIntoView({ behavior: 'smooth' });
}

// Écouteur d'événement pour soumettre le formulaire email
document.getElementById('submitForm').addEventListener('click', (event) => {
    event.preventDefault(); // Empêche la soumission du formulaire par défaut

    const email = document.getElementById('email').value;
    const fname = document.getElementById('fname').value;
    const lname = document.getElementById('lname').value;
    const phone = document.getElementById('phone').value;

    // Validation des champs
    if (!fname || !lname || !phone || !email) {
        alert('Veuillez remplir tous les champs du formulaire.');
        return;
    }

    if (validateEmail(email)) {
        showResultsWithEmail();
    } else {
        alert('Veuillez entrer un email valide.');
    }
});

// Fonction pour valider l'email
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

// Fonction pour afficher les résultats avec email
function showResultsWithEmail() {
    document.getElementById('emailSection').classList.add('hidden');
    document.getElementById('resultsSection').classList.remove('hidden');

    const result = calculateResult();
    const resultsText = document.getElementById('resultsText');
    const resultsDetails = document.getElementById('resultsDetails');

    resultsText.innerText = `Votre accompagnement idéal : ${result.title}`;
    resultsDetails.innerHTML = `<li>${result.description}</li>`;

    // Récupérer les données du formulaire
    const fname = document.getElementById('fname').value;
    const lname = document.getElementById('lname').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;

    // Envoyer l'email uniquement si le résultat est A ou B
    if (resultKeyGlobal === 'A' || resultKeyGlobal === 'B') {
        // Envoyer les données au contrôleur Laravel
        fetch('/send-test-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                fname: fname,
                lname: lname,
                email: email,
                phone: phone,
                result: resultKeyGlobal
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                document.getElementById('resultMessage').classList.remove('hidden');
                document.getElementById('noEmailResultMessage').classList.add('hidden');
                
                // Faire défiler jusqu'à l'alerte
                document.getElementById('resultMessage').scrollIntoView({ behavior: 'smooth' });
            } else {
                alert('Erreur : ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue lors de l\'envoi de l\'email.');
        });
    } else {
        // Pour les autres résultats, afficher un message différent
        document.getElementById('noEmailResultMessage').classList.remove('hidden');
        document.getElementById('resultMessage').classList.add('hidden');
        
        // Faire défiler jusqu'à l'alerte
        document.getElementById('noEmailResultMessage').scrollIntoView({ behavior: 'smooth' });
    }
}

// Fonction pour calculer le résultat basé sur les réponses
function calculateResult() {
    const counts = { A: 0, B: 0, C: 0, D: 0, E: 0 };
    answers.forEach(answer => counts[answer]++);
    const max = Math.max(...Object.values(counts));
    const resultKey = Object.keys(counts).find(key => counts[key] === max);

    const results = {
        A: {
            title: "Coaching Confiance en Soi et Estime de Soi",
            description: "Idéal si vous souhaitez renforcer votre assurance, oser vous affirmer et dépasser vos peurs."
        },
        B: {
            title: "Coaching Gestion du Stress et des Émotions",
            description: "Parfait si vous cherchez à mieux comprendre et réguler vos émotions pour retrouver un état de sérénité."
        },
        C: {
            title: "Coaching Équilibre de Vie",
            description: "Vous avez besoin d'un accompagnement pour organiser votre temps, réduire votre charge mentale et trouver un meilleur équilibre."
        },
        D: {
            title: "Coaching Motivation et Discipline",
            description: "Conçu pour ceux qui souhaitent renforcer leur motivation, éviter la procrastination et atteindre leurs objectifs avec plus de constance."
        },
        E: {
            title: "Coaching Transition et Résilience",
            description: "Idéal si vous traversez un changement de vie (séparation, perte d'emploi, reconversion) et que vous cherchez à rebondir sereinement."
        }
    };

    return { 
        title: results[resultKey].title, 
        description: results[resultKey].description,
        resultKey: resultKey 
    };
}

// Écouteur d'événement pour redémarrer le test
document.getElementById('restartButton').addEventListener('click', () => {
    currentQuestion = 0;
    answers = [];
    resultKeyGlobal = '';
    document.getElementById('resultsSection').classList.add('hidden');
    document.getElementById('resultMessage').classList.add('hidden');
    document.getElementById('noEmailResultMessage').classList.add('hidden');
    document.getElementById('quizForm').classList.add('hidden');
    document.getElementById('initialContent').classList.remove('hidden');
});