<?php
session_start();

require_once("config/FlopFlix-Commande.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="FlopFlix.css">
    <title>Connexion - FlopFlix</title>
</head>
<body>
    <div class="connexion-container">
        <h1>Connexion</h1>
        <form action="connexion.php" method="POST">
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" name="motdepasse" id="motdepasse" required>
            </div>
            <button type="submit" name="submit">Se connecter</button>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];

        // Vérifier les informations d'identification pour l'administrateur
        $admin = getAdmin($email, $motdepasse);
        if ($admin) {
            $_SESSION['admin01020304'] = $admin;
            header("Location: admin/AjouterUnFilm.php");
        } else {
            // Vérifier les informations d'identification pour l'utilisateur
            $utilisateur = getUser($email, $motdepasse);

            if ($utilisateur) {
                // Si l'authentification réussit, créer une session et rediriger vers la page d'accueil
                $_SESSION['user_id'] = $utilisateur['id'];
                $_SESSION['user_email'] = $utilisateur['email'];
                header("Location: ./FlopFlix.php");
            } else {
                // Sinon, afficher un message d'erreur
                echo "<p class='error-message'>Email ou mot de passe incorrect.</p>";
            }
        }
    }
    ?>
</body>
</html>
