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
        <title>Tout les films - FlopFlix</title>
        <link rel="stylesheet" type="text/css" href="./ToutLesFilms.css">

    </head>
    <body>
            <header>
                <nav>
                    <label class="logo">
                        <img src="./IMG/Logo_FlopFlix.png" alt="" id="logo">
                    </label>
                    <ul>
                <li><a href="./FlopFlix.php">Accueil</a></li>
                        <li><a href="./Film-Horreur.php">Film d'horreur</a></li>
                <li><a href="./Film-Comedie.php">Film de comédie</a></li>
                <li><a href="./Film-Aventure.php">Film d'aventure</a></li>
                <li><a href="./Film-Action.php">Film d'action</a></li>
                <li><a href="./Film-Science_fiction.php">Film de Science-fiction</a></li>
                <li><a class="active" href="./admin/ToutLesFilms.php">Tout les Films</a></li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="./panier.php">Panier</a></li>
                <li><a href="./deconnexion.php">Déconnexion</a></li>
                <?php endif; ?>

                <form style="align: right;" class="search-form" action="./FlopFlix.php" method="GET">
                        <input style="border-radius: 10px;padding: 5px 10px;align: right;" type="text" name="q" placeholder="Rechercher un film...">
                        <button type="submit">Rechercher</button>
                    </form>
            
                    </ul>

            <ul class="nav-right">
                <li><a href="./inscription.php" class="nav-button">Inscription</a></li>
                <li><a href="./connexion.php" class="nav-button">Connexion</a></li>
            </ul>
                    
                </nav>
            </header>

            <div class="film-grid">
                
            </div>

            <table class="film-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Prix</th>
                        <th>Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach($films as $film): ?>

                    <tr>
                        <th scope="row"><?= $film->id ?></th> 
                        <td>
                            <img src="<?= $film->image ?>" style="width: 20%" alt="Image du film">
                        </td>
                        <td><?= $film->nom ?></td>
                        <td style="font-weight: bold; color: green;"><?= $film->prix ?>€</td>
                        <td><?= substr($film->description, 0, 100); ?>...</td>
                    </tr>

                <?php endforeach; ?>
                    
                </tbody>
            </table>



    </body>
</html>

