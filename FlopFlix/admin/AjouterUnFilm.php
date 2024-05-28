<?php

    session_start();

    if(!isset($_SESSION['admin01020304'])){
        header("Location: ../login.php");
    }
    
    if(empty($_SESSION['admin01020304'])){
        header("Location: ../login.php");
    }

    require("../config/FlopFlix-Commande.php");

?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajouter un film</title>
        <link rel="stylesheet" type="text/css" href="AjouterUnFilm.css">
    </head>
    <body>
            <header>
                
                <nav>
                    <label class="logo">
                        <img src="../IMG/Logo_FlopFlix.png" alt="" id="logo">
                    </label>

                    <ul>
                        <li><a class="active" href="./AjouterUnFilm.php">Ajouter Un Film</a></li>
                        <li><a href="./SupprimerUnFilm.php">Supprimer Un Film</a></li>
                        <li><a href="./Deconnexion.php">Se Déconnecter</a></li>
                    </ul>
                </nav>

            </header>

            

            <h1>Ajouter un film</h1>
            <form method="post">
                <label for="nom">Nom du film :</label>
                <input type="text" id="nom" name="nom" required><br>

                <label for="image">Lien de l'image :</label>
                <input type="text" id="image" name="image" required><br>

                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" required><br>

                <label for="description">Description :</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

                <label for="realisateur">Réalisateur :</label>
                <input type="text" name="realisateur" id="realisateur" required>

                <input type="submit" value="Ajouter" name= valider id= valider>
            </form>
    </body>
</html>



<?php

if (isset($_POST['valider'])) {
    if (isset($_POST['nom']) && isset($_POST['image']) && isset($_POST['prix']) && isset($_POST['description']) && isset($_POST['realisateur'])) {
        if (!empty($_POST['nom']) && !empty($_POST['image']) && !empty($_POST['prix']) && !empty($_POST['description']) && !empty($_POST['realisateur'])) {
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['description']));
            $realisateur = htmlspecialchars(strip_tags($_POST['realisateur']));
            try {
                ajouter($nom, $image, $prix, $desc, $realisateur);
                echo "Film ajouté avec succès";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}

?>
