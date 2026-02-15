<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Candidature non retenue</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; background:#f4f6f9; padding:20px;">

    <div
        style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.05);">

        <h2 style="color:#dc3545; text-align:center;">Candidature non retenue</h2>

        <p>Bonjour <strong>{{ $inscription->name }}</strong>,</p>

        <p>
            Nous vous remercions sincèrement pour l’intérêt que vous avez porté à la société
            <strong>Maflyt Sarl</strong> en postulant en tant que <strong>{{ $inscription->specialite->nom }}</strong>.
        </p>

        <p>
            Après étude de votre dossier, nous sommes au regret de vous informer que votre candidature
            n’a pas été retenue pour cette fois.
        </p>

        <p>
            Nous vous encourageons à continuer à développer vos compétences et à postuler de nouveau
            lors de prochaines opportunités.
        </p>

        <br>

        <p>Cordialement,</p>
        <p><strong>L’équipe Maflyt Sarl</strong></p>

        <hr style="margin-top:30px;">

        <p style="font-size:12px; color:gray; text-align:center;">
            Ceci est un email automatique, merci de ne pas y répondre.
        </p>

    </div>

</body>

</html>