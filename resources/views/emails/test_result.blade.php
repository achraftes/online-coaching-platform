<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat du Test</title>
</head>
<body>
    <h1>Bonjour {{ $data['fname'] }} {{ $data['lname'] }},</h1>

    

    @if ($data['result'] === 'A')
        
        <p>Merci d’avoir complété le test d’orientation en coaching personnel. Votre profil indique que votre principal besoin est de renforcer votre <strong>confiance en vous et votre estime de soi.</strong></p>
        <h3>Ce que cela signifie</h3>
        <p>Vous avez du mal à vous affirmer, vous doutez parfois de vos capacités ou vous êtes freiné(e) par le regard des autres. Peut-être ressentez-vous une peur de l’échec ou une difficulté à vous imposer dans certaines situations.</p>
        <h3>Comment le coaching peut vous aider</h3>
        <ul>
            <li>Apprendre à dépasser vos croyances limitantes.</li>
            <li>Développer une posture plus affirmée et sereine.</li>
            <li>Améliorer votre communication et votre capacité à dire non.</li>
            <li>Renforcer votre estime personnelle et votre confiance au quotidien.</li>
        </ul>
    @else
        
        <p>Merci d’avoir répondu à notre test. Vos réponses montrent que votre principal besoin concerne la <strong>gestion du stress et des émotions.</strong></p>
        <h3>Ce que cela signifie</h3>
        <p>Vous ressentez parfois une charge mentale importante, de l’anxiété ou des difficultés à gérer vos émotions au quotidien. Peut-être avez-vous du mal à relâcher la pression ou à trouver des solutions efficaces pour retrouver du calme.</p>
        <h3>Comment le coaching peut vous aider</h3>
        <ul>
            <li>Identifier les causes de votre stress et apprendre à mieux y réagir.</li>
            <li>Développer des techniques de relaxation et de gestion émotionnelle.</li>
            <li>Améliorer votre organisation pour réduire la charge mentale.</li>
            <li>Retrouver plus de sérénité et de bien-être au quotidien.</li>
        </ul>
    @endif

    <p>Nous vous contacterons bientôt pour discuter de vos résultats.</p>
    <p>Cordialement,</p>
    <p>L'équipe de Coaching Professionnel</p>
</body>
</html>

