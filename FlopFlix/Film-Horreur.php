<?php

require("config/FlopFlix-Commande.php");

if(isset($_GET['q'])) {
$films = rechercher($_GET['q']);
} else {
$films = afficher();
}

Ajouteraupanier('nom','categorie', 'image', 'prix','quantite');

?>



<!DOCTYPE html>
<html>
  
  <head>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="FlopFlix.css">

		<title>Film d'horreur - FlopFlix</title>
	
	</head>
    
    
    <body>

    <header>
		<nav>
			<label class="logo">
				<img src="./IMG/Logo_FlopFlix.png" alt="" id="logo">
			</label>
			<ul>
        <li><a href="./FlopFlix.php">Accueil</a></li>
				<li><a class="active" href="./Film-Horreur.php">Film d'horreur</a></li>
        <li><a href="./Film-Comedie.php">Film de comédie</a></li>
        <li><a href="./Film-Aventure.php">Film d'aventure</a></li>
        <li><a href="./Film-Action.php">Film d'action</a></li>
        <li><a href="./Film-Science_fiction.php">Film de Science-fiction</a></li>
        <li><a href="./Film-Drama.php">Film drama</a></li>
        <li><a href="./Film-Sport.php">Film Sport</a></li>
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
          <?php foreach($films as $film): ?>
            <div class="film-item">
              <img src="<?= $film->image ?>" alt="<?= $film->nom ?>">
              <h2><?= $film->nom ?></h2>
              <p class="prix"><?= $film->prix ?>€</p>
              <p class="realisateur">Réalisateur : <?= $film->realisateur ?></p>
              <p class="description"><?= substr($film->description, 0, 200) ?></p>
              <div class="buttons-container">
              <button class="Acheter-btn" onclick="window.location.href='presentation-film.php?id=<?= $film->id ?>'">Acheter</button>
              <?php if (estConnecte()): ?>
                  <button class="Ajouter-panier">Ajouter au panier</button>
              <?php endif; ?>
          </div>

            </div>
          <?php endforeach; ?>
        </div>

  </body>
</html>
        

	
    </body>
</html