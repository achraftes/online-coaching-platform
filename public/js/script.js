//  // Code existant pour la navigation mobile
//  if (document.getElementById('nav-mobile-btn')) {
//     document.getElementById('nav-mobile-btn').addEventListener('click', function() {
//         if (this.classList.contains('close')) {
//             document.getElementById('nav').classList.add('hidden');
//             this.classList.remove('close');
//         } else {
//             document.getElementById('nav').classList.remove('hidden');
//             this.classList.add('close');
//         }
//     });
// }

// // Gestion de la modal
// const modal = document.getElementById('inscriptionModal');
// const selectPlanBtns = document.querySelectorAll('.select-plan-btn');
// const closeBtn = document.querySelector('.close-button');
// const form = document.getElementById('inscriptionForm');
// const successMessage = document.getElementById('successMessage');

// function showModal() {
//     modal.style.display = 'block';
//     setTimeout(() => modal.classList.add('show'), 10);
//     document.body.style.overflow = 'hidden';
// }

// function hideModal() {
//     modal.classList.remove('show');
//     setTimeout(() => {
//         modal.style.display = 'none';
//         document.body.style.overflow = 'auto';
//     }, 300);
// }

// function showSuccess() {
//     successMessage.style.display = 'block';
//     setTimeout(() => successMessage.style.display = 'none', 3000);
// }

// function clearErrors() {
//     document.querySelectorAll('.error-text').forEach(error => {
//         error.style.display = 'none';
//         error.textContent = '';
//     });
// }

// function showError(field, message) {
//     const error = document.querySelector(`[data-error="${field}"]`);
//     if (error) {
//         error.textContent = message;
//         error.style.display = 'block';
//     }
// }

// // Ajouter l'événement click à tous les boutons
// selectPlanBtns.forEach(btn => {
//     btn.addEventListener('click', (e) => {
//         e.preventDefault();
//         showModal();
//     });
// });

// closeBtn.addEventListener('click', hideModal);
// modal.addEventListener('click', (e) => {
//     if (e.target === modal) hideModal();
// });

// document.addEventListener('keydown', (e) => {
//     if (e.key === 'Escape') hideModal();
// });

// form.addEventListener('submit', async (e) => {
//     e.preventDefault();
//     clearErrors();

//     const formData = new FormData(form);
//     const data = Object.fromEntries(formData.entries());

//     try {
//         const response = await fetch('/clients', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//             },
//             body: JSON.stringify(data)
//         });

//         const result = await response.json();

//         if (response.ok) {
//             hideModal();
//             form.reset();
//             showSuccess();
//             showPaymentModal(data); // Afficher la modal de paiement après l'inscription réussie
//         } else if (response.status === 422 && result.errors) {
//             Object.entries(result.errors).forEach(([field, [message]]) => {
//                 showError(field, message);
//             });
//         } else {
//             throw new Error(result.message || 'Une erreur est survenue');
//         }
//     } catch (error) {
//         console.error('Erreur:', error);
//         alert(error.message || 'Une erreur est survenue. Veuillez réessayer.');
//     }
// });

// const paymentModal = document.getElementById('paymentModal');
// const servicePrices = {
//     'starter': 'CA$550.00',
//     'professional': 'CA$750.00',
//     'enterprise': 'CA$950.00'
// };

// const serviceNames = {
//     'starter': 'Starter',
//     'professional': 'Professional',
//     'enterprise': 'Enterprise'
// };
 
// function showPaymentModal(serviceData) {
//     // Mettre à jour le récapitulatif
//     document.getElementById('summary-service').textContent = serviceNames[serviceData.service];
//     document.getElementById('summary-price').textContent = servicePrices[serviceData.service];
//     document.getElementById('summary-total').textContent = servicePrices[serviceData.service];

//     // Afficher la modal de paiement
//     paymentModal.style.display = 'block';
//     setTimeout(() => paymentModal.classList.add('show'), 10);
// }

// function hidePaymentModal() {
//     paymentModal.classList.remove('show');
//     setTimeout(() => {
//         paymentModal.style.display = 'none';
//     }, 300);
// }

// function processPayment() {
//     const paymentMethod = document.querySelector('input[name="payment_method"]:checked');

//     if (!paymentMethod) {
//         alert('Veuillez sélectionner un mode de paiement');
//         return;
//     }

//     // Ici vous pouvez ajouter la logique de traitement du paiement
//     alert('Paiement confirmé ! Vous recevrez un email de confirmation.');
//     hidePaymentModal();
// }



 // ========================== Quiz Coaching ==========================
// Ce script gère un quiz interactif permettant aux utilisateurs de répondre 
// à une série de questions pour déterminer le type de coaching qui leur convient.

// Définition des questions et des options pour chaque question

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
    document.getElementById('resultsSection').classList.add('show');

    const resultsText = document.getElementById('resultsText');
    const resultsDetails = document.getElementById('resultsDetails');

    resultsText.innerText = `${result.title}`;
    resultsDetails.innerHTML = `<li>${result.description}</li>`;

    // Pour les résultats C, D et E, afficher le message sans email
    document.getElementById('noEmailResultMessage').classList.remove('hidden');
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
    document.getElementById('resultsSection').classList.add('show');

    const result = calculateResult();
    const resultsText = document.getElementById('resultsText');
    const resultsDetails = document.getElementById('resultsDetails');

    resultsText.innerText = `${result.title}`;
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
    document.getElementById('resultsSection').classList.remove('show');
    document.getElementById('resultMessage').classList.add('hidden');
    document.getElementById('noEmailResultMessage').classList.add('hidden');
    document.getElementById('quizForm').classList.add('hidden');
    document.getElementById('initialContent').classList.remove('hidden');
});   


document.addEventListener("DOMContentLoaded", () => {
    // Variables globales
    let currentModal = null;
    let stripeInstance = null;
    let cardElement = null;
    let paypalLoaded = false;

    // Définition des services et leurs prix
    const serviceNames = {
        'basic': 'Service de Base',
        'premium': 'Service Premium',
        'luxury': 'Service de Luxe'
    };

    const servicePrices = {
        'basic': '50€',
        'premium': '100€',
        'luxury': '200€'
    };

    // Initialisation de Stripe avec la clé publique
    const stripePublicKey = 'pk_test_51R2JiDKXCswdU07U96r1QyW90xAPCXHdAT97T0yHjXTexLuPKsIhXsRYSxAyk49vosXvpZnllQCTpvfjjI3KJ56u00PCYWM2cg';
    try {
        let stripeInstance = Stripe(stripePublicKey);
        const elements = stripeInstance.elements();
        let card= elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    '::placeholder': {
                        color: '#aab7c4'
                    },
                    iconColor: '#4F46E5'
                },
                invalid: {
                    color: '#dc2626',
                    iconColor: '#dc2626'
                }
            }
        });
    } catch (error) {
        console.error('Erreur lors de l\'initialisation de Stripe:', error);
    }

    const selectedOption = document.getElementById('selectedOption');
    const options = document.getElementById('options');
    const serviceInput = document.getElementById('serviceInput'); // Champ caché pour envoyer la valeur sélectionnée

// Afficher ou cacher la liste des options
    selectedOption.addEventListener('click', () => {
        options.style.display = options.style.display === 'block' ? 'none' : 'block';
    });

// Gérer la sélection des options
    options.querySelectorAll('.option').forEach(option => {
        option.addEventListener('click', () => {
            const selectedValue = option.getAttribute('data-value'); // Récupérer la valeur de l'option
            selectedOption.textContent = option.textContent; // Mettre à jour l'affichage
            serviceInput.value = selectedValue; // Mettre à jour le champ caché
            options.style.display = 'none'; // Cacher les options après sélection
        });
    });

// Afficher les sous-options au survol
    document.querySelectorAll('.optgroup').forEach(group => {
        group.addEventListener('mouseenter', () => {
            group.querySelector('.sub-options').style.display = 'block';
        });

        group.addEventListener('mouseleave', () => {
            group.querySelector('.sub-options').style.display = 'none';
        });
    });


    // Fonctions de gestion des modales
    function showModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'block';
            currentModal = modal;
            setTimeout(() => modal.classList.add('show'), 10);
            document.body.style.overflow = 'hidden';
        }
    }

    function hideModal(modalId) {
        const modal = modalId ? document.getElementById(modalId) : currentModal;
        if (modal) {
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                if (modal === currentModal) {
                    currentModal = null;
                }
            }, 300);
            document.body.style.overflow = '';
        }
    }

    // Gestion de la navigation mobile
    const navBtn = document.getElementById('nav-mobile-btn');
    const nav = document.getElementById('nav');

    if (navBtn) {
        navBtn.addEventListener('click', function() {
            this.classList.toggle('close');
            nav.classList.toggle('hidden');
        });
    }

    // Gestion des modales
    document.querySelectorAll('.modal').forEach(modal => {
        const closeBtn = modal.querySelector('.close-button');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => hideModal(modal.id));
        }

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                hideModal(modal.id);
            }
        });
    });

    // Gestion des touches clavier
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && currentModal) {
            hideModal();
        }
    });

    // Gestion du formulaire d'inscription
    const form = document.getElementById('inscriptionForm');
    if (form) {
        form.addEventListener('submit', handleFormSubmit);
    }

    async function handleFormSubmit(e) {
        e.preventDefault();
        clearErrors();

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const response = await fetch('/clients', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                const result = await response.json();
                if (response.status === 422 && result.errors) {
                    handleValidationErrors(result.errors);
                    return;
                }
                throw new Error(result.message || 'Une erreur est survenue');
            }

            const result = await response.json();

            // Afficher le message de succès avant de cacher la modale
            showSuccess('Inscription réussie ! Veuillez choisir votre mode de paiement.');

            // Attendre un court instant pour que le message soit visible
            await new Promise(resolve => setTimeout(resolve, 1000));

            // Récupérer les valeurs avant de réinitialiser le formulaire
            const selectedService = document.getElementById('serviceInput').value;
            const selectedOption = document.querySelector(`.option[data-value="${selectedService}"]`);
            const serviceText = selectedOption ? selectedOption.textContent : 'Service non sélectionné';
            const servicePrice = selectedService === 'personal' ? '90€' : '0€';

            hideModal('inscriptionModal');
            
            // Passer les données complètes à showPaymentModal
            showPaymentModal({
                ...data,
                service: selectedService,
                serviceText: serviceText,
                servicePrice: servicePrice
            });
            
            form.reset();
        } catch (error) {
            console.error('Erreur:', error);
            showError('form', error.message || 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    // Gestion de la modal de paiement
    const paymentModal = document.getElementById('paymentModal');

    function showPaymentModal(serviceData) {
        // Utiliser les données passées à la fonction
        const firstName = serviceData.fname;
        const lastName = serviceData.lname;
        const email = serviceData.email;
        const phone = serviceData.phone;
        const serviceText = serviceData.serviceText;
        
        // Déterminer le prix en fonction du service
        let servicePrice = '0€';
        switch(serviceData.service) {
            case 'personalCoaching':
                servicePrice = '90€';
                break;
            case 'professionalDevelopment':
                servicePrice = '250€';
                break;
            case 'professionalReconversion':
                servicePrice = '400€';
                break;
            case 'entrepreneurshipStandardPack':
                servicePrice = '800€';
                break;
            case 'entrepreneurshipPremiumPack':
                servicePrice = 'Tarif sur devis';
                break;
            default:
                servicePrice = '0€';
        }
        
        // Mettre à jour le récapitulatif avec les valeurs du formulaire
        const summaryService = document.getElementById('summary-service');
        const summaryPrice = document.getElementById('summary-price');
        const summaryTotal = document.getElementById('summary-total');
        const summaryName = document.getElementById('summary-name');
        const summaryEmail = document.getElementById('summary-email');
        const summaryPhone = document.getElementById('summary-phone');

        // Mettre à jour le service et le prix
        if (summaryService) summaryService.textContent = serviceText;
        if (summaryPrice) summaryPrice.textContent = servicePrice;
        if (summaryTotal) summaryTotal.textContent = servicePrice;
        if (summaryName) summaryName.textContent = `${firstName || ''} ${lastName || ''}`;
        if (summaryEmail) summaryEmail.textContent = email || '';
        if (summaryPhone) summaryPhone.textContent = phone || '';

        const modal = document.getElementById('paymentModal');
        if (modal) {
            modal.style.display = 'block';
            setTimeout(() => modal.classList.add('show'), 10);
            document.body.style.overflow = 'hidden';
        }
    }

    // Déclarer la fonction dans le scope global
    function hidePaymentModal() {
        const paymentModal = document.getElementById('paymentModal');
        if (paymentModal) {
            // Réinitialiser les éléments de paiement
            const stripeElements = document.getElementById('stripe-elements');
            const paypalContainer = document.getElementById('paypal-button-container');
            const confirmBtn = document.getElementById('confirm-payment-btn');
            const cardErrors = document.getElementById('card-errors');

            // Cacher tous les conteneurs de paiement
            if (stripeElements) stripeElements.classList.add('hidden');
            if (paypalContainer) paypalContainer.classList.add('hidden');
            if (confirmBtn) confirmBtn.classList.add('hidden');
            if (cardErrors) cardErrors.innerHTML = '';

            // Décocher tous les boutons radio
            document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                radio.checked = false;
            });

            // Animation de fermeture
            paymentModal.classList.remove('show');
            setTimeout(() => {
                paymentModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }, 300);
        }
    }

    // Initialisation des gestionnaires d'événements pour la modal de paiement
    const initPaymentModalHandlers = () => {
        // Fermeture en cliquant sur les boutons
        const closeButtons = document.querySelectorAll('.payment-modal .close-button, .btn-secondary');
        closeButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                hidePaymentModal();
            });
        });

        // Fermeture en cliquant en dehors de la modal
        const modal = document.getElementById('paymentModal');
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    hidePaymentModal();
                }
            });
        }
    };

    // Initialiser les gestionnaires d'événements
    initPaymentModalHandlers();

    // Fermeture avec la touche Echap
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            hidePaymentModal();
        }
    });

    // Gestion des paiements
    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    const stripeElements = document.getElementById('stripe-elements');
    const paypalContainer = document.getElementById('paypal-button-container');
    const cardErrors = document.getElementById('card-errors');
    const confirmPaymentBtn = document.getElementById('confirm-payment-btn');

    function initializePaymentMethods() {
        const stripeElements = document.getElementById('stripe-elements');
        const paypalContainer = document.getElementById('paypal-button-container');
        const confirmPaymentBtn = document.getElementById('confirm-payment-btn');

        // Initialisation de Stripe Elements
        if (stripeInstance && stripeElements) {
            try {
                const elements = stripeInstance.elements();
                cardElement = elements.create('card', {
                    style: {
                        base: {
                            fontSize: '16px',
                            color: '#32325d',
                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                            '::placeholder': {
                                color: '#aab7c4'
                            },
                            iconColor: '#4F46E5'
                        },
                        invalid: {
                            color: '#dc2626',
                            iconColor: '#dc2626'
                        }
                    }
                });

                cardElement.mount('#card-element');

                cardElement.on('change', function(event) {
                    const displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.innerHTML = `
                            <div class="flex items-center gap-2 text-red-600 bg-red-50 p-3 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>${event.error.message}</span>
                            </div>
                        `;
                    } else {
                        displayError.textContent = '';
                    }
                });
            } catch (error) {
                console.error('Erreur lors de l\'initialisation de Stripe Elements:', error);
            }
        }

        // Écouteurs d'événements pour les méthodes de paiement
        const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
        paymentMethodRadios.forEach(radio => {
            radio.addEventListener('change', handlePaymentMethodChange);
        });

        if (confirmPaymentBtn) {
            confirmPaymentBtn.addEventListener('click', processPayment);
            console.log('Écouteur d\'événement ajouté au bouton de confirmation');
        }

        // Vérifier si PayPal est déjà chargé
        if (window.paypal) {
            initializePayPal();
        } else {
            // Attendre que PayPal soit chargé
            window.addEventListener('paypal-loaded', initializePayPal);
        }
    }

    // Ajouter un événement pour détecter quand PayPal est chargé
    window.addEventListener('load', function() {
        const paypalScript = document.querySelector('script[src*="paypal"]');
        if (paypalScript) {
            paypalScript.addEventListener('load', function() {
                window.dispatchEvent(new Event('paypal-loaded'));
            });
        }
    });

    // Fonction pour vérifier si PayPal est chargé
    function checkPayPalLoaded() {
        return new Promise((resolve) => {
            if (window.paypal) {
                resolve(true);
                return;
            }

            // Vérifier toutes les 100ms pendant 10 secondes maximum
            let attempts = 0;
            const interval = setInterval(() => {
                attempts++;
                if (window.paypal) {
                    clearInterval(interval);
                    resolve(true);
                } else if (attempts >= 100) { // 10 secondes
                    clearInterval(interval);
                    resolve(false);
                }
            }, 100);
        });
    }

    async function initializePayPal() {
        const paypalContainer = document.getElementById('paypal-button-container');
        if (!paypalContainer) {
            console.error('Conteneur PayPal manquant');
            showPaymentError('Conteneur PayPal non trouvé');
            return;
        }

        try {
            console.log('Tentative de chargement de PayPal...');

            // Vider le conteneur avant de réinitialiser
            paypalContainer.innerHTML = '<div class="text-gray-600 p-4 text-center">Chargement de PayPal...</div>';

            await window.loadPayPalScript();

            // Vérifier si PayPal est disponible
            if (!window.paypal || !window.paypal.Buttons) {
                throw new Error('PayPal n\'est pas correctement initialisé');
            }

            console.log('PayPal est chargé, initialisation des boutons...');
            paypalContainer.innerHTML = '';

            const buttons = window.paypal.Buttons({
                style: {
                    layout: 'vertical',
                    color: 'blue',
                    shape: 'rect',
                    label: 'paypal'
                },
                createOrder: function(data, actions) {
                    const amount = getFormattedAmount();
                    const service = document.getElementById('summary-service').textContent;

                    console.log('Création de la commande PayPal avec le montant:', amount);

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: amount,
                                currency_code: 'CAD'
                            },
                            description: `Service de coaching: ${service}`
                        }]
                    });
                },
                onApprove: async function(data, actions) {
                    try {
                        console.log('Paiement PayPal approuvé, capture en cours...');
                        const order = await actions.order.capture();
                        console.log('Commande PayPal capturée:', order);
                        await handlePaymentSuccess('paypal', order.id);
                        hidePaymentModal();
                        showSuccess('Paiement PayPal réussi ! Un email de confirmation vous sera envoyé.');
                    } catch (error) {
                        console.error('Erreur lors de la capture PayPal:', error);
                        showPaymentError('Erreur lors du paiement PayPal. Veuillez réessayer.');
                    }
                },
                onError: function(err) {
                    console.error('Erreur PayPal:', err);
                    showPaymentError('Une erreur est survenue avec PayPal. Veuillez réessayer.');
                    paypalContainer.innerHTML = '<div class="text-red-600 p-4 text-center">Une erreur est survenue. Veuillez rafraîchir la page ou choisir un autre mode de paiement.</div>';
                }
            });

            // Vérifier si les boutons peuvent être rendus
            const isEligible = await buttons.isEligible();
            if (!isEligible) {
                throw new Error('PayPal n\'est pas disponible pour ce paiement');
            }

            await buttons.render('#paypal-button-container');
            console.log('Boutons PayPal initialisés avec succès');
            paypalLoaded = true;

        } catch (error) {
            console.error('Erreur lors de l\'initialisation des boutons PayPal:', error);
            paypalContainer.innerHTML = `
                <div class="text-red-600 p-4 text-center">
                    <p class="font-semibold mb-2">PayPal n'est pas disponible pour le moment.</p>
                    <p class="text-sm">Veuillez choisir un autre mode de paiement ou réessayer plus tard.</p>
                </div>
            `;
            throw error;
        }
    }

    function handlePaymentMethodChange(e) {
        console.log('Changement de méthode de paiement:', e.target.value);
        hideAllPaymentContainers();
        const confirmBtn = document.getElementById('confirm-payment-btn');

        switch(e.target.value) {
            case 'stripe':
                stripeElements.classList.remove('hidden');
                confirmBtn.classList.remove('hidden');
                break;
            case 'paypal':
                paypalContainer.classList.remove('hidden');
                confirmBtn.classList.add('hidden');
                if (!paypalLoaded) {
                    initializePayPal().catch(error => {
                        console.error('Erreur lors de l\'initialisation de PayPal:', error);
                        showPaymentError('Erreur lors du chargement de PayPal. Veuillez rafraîchir la page.');
                    });
                }
                break;
            case 'onsite':
                confirmBtn.classList.remove('hidden');
                break;
        }
    }

    function hideAllPaymentContainers() {
        stripeElements.classList.add('hidden');
        paypalContainer.classList.add('hidden');
        if (cardErrors) {
            cardErrors.style.display = 'none';
        }
    }

    async function processPayment(event) {
        event.preventDefault();

        const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (!paymentMethod) {
            showPaymentError('Veuillez sélectionner un mode de paiement');
            return;
        }

        const spinner = document.getElementById('payment-spinner');
        const btnText = document.querySelector('.btn-text');

        try {
            showSpinner(spinner);
            updateButtonText(btnText, 'Traitement en cours...');
            clearPaymentError();

            console.log('Mode de paiement sélectionné:', paymentMethod.value);

            switch(paymentMethod.value) {
                case 'stripe':
                    console.log('Traitement du paiement Stripe...');
                    await handleStripePayment();
                    break;
                case 'onsite':
                    console.log('Traitement du paiement sur place...');
                    await handleOnsitePayment();
                    break;
                case 'paypal':
                    console.log('Veuillez utiliser les boutons PayPal directement');
                    showPaymentError('Pour PayPal, veuillez utiliser les boutons PayPal ci-dessus');
                    break;
                default:
                    throw new Error('Mode de paiement non reconnu');
            }
        } catch (error) {
            console.error('Erreur lors du traitement du paiement:', error);
            showPaymentError(error.message || 'Une erreur est survenue lors du traitement du paiement');
        } finally {
            hideSpinner(spinner);
            updateButtonText(btnText, 'Confirmer le paiement');
        }
    }

    function showPaymentError(message) {
        const cardErrors = document.getElementById('card-errors');
        if (cardErrors) {
            cardErrors.innerHTML = `
                <div class="flex items-center gap-2 text-red-600 bg-red-50 p-3 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>${message}</span>
                </div>
            `;
            cardErrors.style.display = 'block';
        }
    }

    function showSpinner(spinner) {
        if (spinner) {
            spinner.classList.remove('hidden');
        }
    }

    function hideSpinner(spinner) {
        if (spinner) {
            spinner.classList.add('hidden');
        }
    }

    function updateButtonText(button, text) {
        if (button) {
            button.textContent = text;
        }
    }

    function getFormattedAmount() {
        const amount = document.getElementById('summary-total').textContent
            .replace('CA$', '')
            .replace(',', '')
            .replace('.00', '')
            .trim();
        return amount;
    }

    // Initialisation
    try {
        stripeInstance = Stripe('pk_test_51R2JiDKXCswdU07U96r1QyW90xAPCXHdAT97T0yHjXTexLuPKsIhXsRYSxAyk49vosXvpZnllQCTpvfjjI3KJ56u00PCYWM2cg');
    } catch (error) {
        console.error('Erreur lors de l\'initialisation de Stripe:', error);
    }

    window.addEventListener('load', initializePaymentMethods);

    // Amélioration de la gestion des erreurs
    function handleValidationErrors(errors) {
        Object.entries(errors).forEach(([field, messages]) => {
            showError(field, Array.isArray(messages) ? messages[0] : messages);
        });
    }

    function clearErrors() {
        document.querySelectorAll('.error-text').forEach(error => {
            error.style.display = 'none';
            error.textContent = '';
        });
    }

    function showSuccess(message) {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.innerHTML = `
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>${message}</span>
            `;
            successMessage.style.display = 'flex';
            successMessage.style.opacity = '1';

            // Faire disparaître le message après 3 secondes avec une animation
            setTimeout(() => {
                successMessage.style.opacity = '0';
        setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 300);
            }, 3000);
        }
    }

    function showError(field, message) {
        const error = document.querySelector(`[data-error="${field}"]`);
        if (error) {
            error.textContent = message;
            error.style.display = 'block';
        }
    }

    async function handleStripePayment() {
        try {
            if (!stripeInstance) {
                throw new Error('Stripe n\'est pas initialisé correctement');
            }

            if (!cardElement) {
                throw new Error('Le formulaire de carte n\'est pas initialisé');
            }

            console.log('Création du paiement Stripe...');
            const { paymentMethod, error: createError } = await stripeInstance.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: document.getElementById('fname').value + ' ' + document.getElementById('lname').value,
                    email: document.getElementById('email').value
                }
            });

            if (createError) {
                console.error('Erreur lors de la création du paiement:', createError);
                let errorMessage = `
                    <div class="flex flex-col items-center gap-2 text-red-600 bg-red-50 p-4 rounded-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="font-semibold">Carte refusée</p>
                        <p class="text-sm text-center">Veuillez essayer une autre carte ou choisir un autre mode de paiement.</p>
                    </div>
                `;
                
                showPaymentError(errorMessage);
                throw new Error(createError.message);
            }

            if (!paymentMethod || !paymentMethod.id) {
                throw new Error('Impossible de créer la méthode de paiement');
            }

            console.log('Méthode de paiement créée avec succès:', paymentMethod.id);

            const amount = getFormattedAmount();
            const response = await fetch('/api/process-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    payment_method_id: paymentMethod.id,
                    amount: amount,
                    service: document.getElementById('summary-service').textContent,
                    client_name: document.getElementById('fname').value + ' ' + document.getElementById('lname').value,
                    client_email: document.getElementById('email').value
                })
            });

            if (!response.ok) {
                const errorData = await response.json();
                let errorMessage = `
                    <div class="flex flex-col items-center gap-2 text-red-600 bg-red-50 p-4 rounded-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="font-semibold">Carte refusée</p>
                        <p class="text-sm text-center">Veuillez essayer une autre carte ou choisir un autre mode de paiement.</p>
                    </div>
                `;
                
                showPaymentError(errorMessage);
                throw new Error(errorData.message);
            }

            const result = await response.json();

            if (result.requires_action) {
                console.log('Authentification supplémentaire requise...');
                const { paymentIntent, error: actionError } = await stripeInstance.handleCardAction(result.payment_intent_client_secret);

                if (actionError) {
                    let errorMessage = `
                        <div class="flex flex-col items-center gap-2 text-red-600 bg-red-50 p-4 rounded-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="font-semibold">Carte refusée</p>
                            <p class="text-sm text-center">Veuillez essayer une autre carte ou choisir un autre mode de paiement.</p>
                        </div>
                    `;
                    
                    showPaymentError(errorMessage);
                    throw new Error(actionError.message);
                }

                await handlePaymentSuccess('stripe', paymentIntent.id);
            } else if (result.success) {
                console.log('Paiement réussi !');
                hidePaymentModal();
                showSuccess('Paiement par carte réussi ! Un email de confirmation vous sera envoyé.');
            } else {
                throw new Error(result.error || 'Erreur lors du paiement');
            }
        } catch (error) {
            console.error('Erreur Stripe détaillée:', error);
            let errorMessage = `
                <div class="flex flex-col items-center gap-2 text-red-600 bg-red-50 p-4 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="font-semibold">Paiement Invalide</p>
                    <p class="text-sm text-center">Veuillez essayer une autre carte ou choisir un autre mode de paiement.</p>
                </div>
            `;
            showPaymentError(errorMessage);
        }
    }

    async function handleOnsitePayment() {
        const phoneNumber = '+212606939590';
        const clientName = document.getElementById('fname').value + ' ' + document.getElementById('lname').value;
        const clientPhone = document.getElementById('phone').value;
        const clientEmail = document.getElementById('email').value;
        const service = document.getElementById('summary-service').textContent;
        const price = document.getElementById('summary-price').textContent;
        const date = new Date().toLocaleDateString('fr-FR');

        const message = `🌟 *Nouvelle Réservation de Coaching* 🌟%0A%0A` +
            `👤 *Client*%0A` +
            `Nom: ${clientName}%0A` +
            `📞 Tél: ${clientPhone}%0A` +
            `📧 Email: ${clientEmail}%0A%0A` +
            `📋 *Détails de la Réservation*%0A` +
            `🎯 Service: ${service}%0A` +
            `💰 Prix: ${price}%0A` +
            `📅 Date: ${date}%0A` +
            `💳 Paiement: Sur place%0A%0A` +
            `✨ *Confirmation en attente*%0A` +
            `Nous vous contacterons rapidement pour confirmer votre rendez-vous.`;

        window.open(`https://wa.me/${phoneNumber}?text=${message}`, '_blank');
        await handlePaymentSuccess('onsite');
    }

    async function handlePaymentSuccess(method, paymentId = null) {
        try {
            const response = await fetch('/api/confirm-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    payment_method: method,
                    payment_id: paymentId,
                    client_name: document.getElementById('fname').value + ' ' + document.getElementById('lname').value,
                    client_email: document.getElementById('email').value,
                    service: document.getElementById('summary-service').textContent,
                    amount: document.getElementById('summary-total').textContent
                })
            });

            const result = await response.json();

            if (result.success) {
                showSuccess(getSuccessMessage(method));
                hidePaymentModal();
                resetForm();
            } else {
                throw new Error(result.message);
            }
        } catch (error) {
            throw new Error(`Erreur de confirmation: ${error.message}`);
        }
    }

    function getSuccessMessage(method) {
        switch(method) {
            case 'stripe':
                return 'Paiement par carte réussi ! Un email de confirmation vous sera envoyé.';
            case 'paypal':
                return 'Paiement PayPal réussi ! Un email de confirmation vous sera envoyé.';
            case 'onsite':
                return 'Réservation confirmée ! Un message WhatsApp a été envoyé pour confirmation.';
            default:
                return 'Paiement réussi !';
        }
    }

    function resetForm() {
        const form = document.getElementById('inscriptionForm');
        if (form) {
            form.reset();
        }
        if (card) {
            card.clear();
        }
    }

    // Fonction pour nettoyer les erreurs de paiement
    function clearPaymentError() {
        const cardErrors = document.getElementById('card-errors');
        if (cardErrors) {
            cardErrors.style.display = 'none';
            cardErrors.innerHTML = '';
        }
    }
});

