<?php
session_start();

require("config/FlopFlix-Commande.php");

if (isset($_GET['id'])) {
    $film = recupererFilmParId($_GET['id']);
} else {
    header("Location: .//FlopFlix.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="presentation-film.css">
        <title><?= $film->nom ?> - FlopFlix</title>
    </head>
        
    <body>
    <header>
		<nav>
			<label class="logo">
				<img src="./IMG/Logo_FlopFlix.png" alt="" id="logo">
			</label>
			<ul>
        <li><a class="active" href="./FlopFlix.php">Accueil</a></li>
				<li><a href="./Film-Horreur.php">Film d'horreur</a></li>
        <li><a href="./Film-Comedie.php">Film de comédie</a></li>
        <li><a href="./Film-Aventure.php">Film d'aventure</a></li>
        <li><a href="./Film-Action.php">Film d'action</a></li>
        <li><a href="./Film-Science_fiction.php">Film de Science-fiction</a></li>
        <li><a href="./admin/ToutLesFilms.php">Tout les Films</a></li>
		<?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="./panier.php">Panier</a></li>
            <li><a href="./deconnexion.php">Déconnexion</a></li>
        <?php endif; ?>

        <form  class="search-form" action="./FlopFlix.php" method="GET">
				<input style="border-radius: 10px;padding: 5px 10px;align: right;" type="text" name="q" placeholder="Rechercher un film...">
				<button type="submit">Rechercher</button>
		</form>

		</ul>

        <?php if (!isset($_SESSION['user_id'])): ?>
        <ul class="nav-right">
            <li><a href="./inscription.php" class="nav-button">Inscription</a></li>
            <li><a href="./connexion.php" class="nav-button">Connexion</a></li>
        </ul>
        <?php endif; ?>
			
		</nav>
	</header>

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

        <div class="avis-container">
            <h3>Laissez un avis :</h3>
            <form action="traitement-avis.php" method="POST">
                <label for="note">Note :</label>
                <div class="rating">
                <input type="radio" id="star5" name="note" value="5" required><label for="star5"></label>
                <input type="radio" id="star4" name="note" value="4"><label for="star4"></label>
                <input type="radio" id="star3" name="note" value="3"><label for="star3"></label>
                <input type="radio" id="star2" name="note" value="2"><label for="star2"></label>
                <input type="radio" id="star1" name="note" value="1"><label for="star1"></label>
                </div>
                <label for="commentaire">Commentaire :</label>
                <textarea id="commentaire" name="commentaire" rows="4" cols="50" placeholder="Entrez votre commentaire ici..." required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>

            </div>

    </body>
</html>
