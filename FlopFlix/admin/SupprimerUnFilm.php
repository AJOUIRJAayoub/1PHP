<?php

    session_start();

    if(!isset($_SESSION['admin01020304'])){
        header("Location: ../login.php");
    }

    if(empty($_SESSION['admin01020304'])){
        header("Location: ../login.php");
    }

    require("../config/FlopFlix-Commande.php");
    $films=afficher();

?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Supprimer un film</title>
        <link rel="stylesheet" type="text/css" href="./SupprimerUnFilm.css">

    </head>
    <body>
            <header>
                <nav>
                    <label class="logo">
                        <img src="../IMG/Logo_FlopFlix.png" alt="" id="logo">
                    </label>

                    <ul>
                        <li><a href="./AjouterUnFilm.php">Ajouter Un Film</a></li>
                        <li><a class="active" href="./SupprimerUnFilm.php">Supprimer Un Film</a></li>
                        <li><a href="./Deconnexion.php">Se Déconnecter</a></li>
                    </ul>

                </nav>
            </header>



            <h1>Supprimer un film</h1>
            <form method="post">

                <input type="number" placeholder="       Entrer l'id du film" id="idproduit" name="idproduit"  required><br>

                <input type="submit" value="Supprimer" name= valider id= Valider >
            </form>

            <div class="film-grid">
                <?php foreach($films as $film): ?>
                    <div class="film-item">
                        <img src="<?= $film->image ?>" alt="Nom du film">
                        <h2 style= "color: black;"><?= $film->id ?></h2>
                    </div>
                <?php endforeach; ?>
            </div>

    </body>
</html>



<?php

    if(isset($_POST['valider']))
    {
        if(isset($_POST['idproduit']))
        {
            if(!empty($_POST['idproduit']) AND is_numeric($_POST['idproduit']))
            {
                $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));
                

                try {
                    supprimer($idproduit);
                } 
                
                catch (Exception $e) {
                    $e->getMessage();
                }


            }
        }
    }


?>