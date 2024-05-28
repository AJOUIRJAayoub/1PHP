<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="FlopFlix.css">
    <title>Inscription - FlopFlix</title>
</head>
<body>
    <div class="inscription-container">
        <h1>Inscription</h1>
        <form action="inscription.php" method="POST">
            <div class="form-group">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" name="motdepasse" id="motdepasse" required>
            </div>
            <button type="submit" name="submit">S'inscrire</button>
        </form>
    </div>
    <?php
    require_once("config/FlopFlix-Commande.php");

    if (isset($_POST['submit'])) {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];

        // Ajouter le nouvel utilisateur
        addUser($pseudo, $email, $motdepasse);

        // Rediriger vers la page de connexion
        header("Location: connexion.php");
    }
    ?>
</body>
</html>
