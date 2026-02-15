<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Confirmation de réception de candidature</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; background:#f4f6f9; padding:20px;">

    <div
        style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.05);">

        <h2 style="color:#007bff; text-align:center;">Confirmation de réception</h2>

        <p>Bonjour <strong>{{ $inscription->name }}</strong>,</p>

        <p>
            Nous vous confirmons avoir bien reçu votre candidature en tant que
            <strong>{{ $inscription->specialite->nom }}</strong> pour la société
            <strong>Maflyt Sarl</strong>.
        </p>

        <p>
            Votre dossier est actuellement en cours d'étude par notre équipe de recrutement.
            Vous recevrez une notification par e-mail dès que le statut de votre candidature évoluera.
        </p>

        <p>
            Nous vous remercions pour l'intérêt que vous portez à notre entreprise.
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