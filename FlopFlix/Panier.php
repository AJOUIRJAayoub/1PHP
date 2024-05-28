<?php
session_start();

require("config/FlopFlix-Commande.php");

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if (isset($_GET['ajouter'])) {
    $id_film = $_GET['ajouter'];
    if (isset($_SESSION['panier'][$id_film])) {
        $_SESSION['panier'][$id_film]++;
    } else {
        $_SESSION['panier'][$id_film] = 1;
    }
}

$films = array();

foreach ($_SESSION['panier'] as $id_film => $quantite) {
    $films[$id_film] = array(
        'film' => getFilmById($id_film),
        'quantite' => $quantite
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Panier.css">
    <title>Panier - FlopFlix</title>
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
        	<li><a href="./deconnexion.php" class="nav-button deconnexion-button">Déconnexion</a></li>

        <?php endif; ?>

        <form style="align: right;" class="search-form" action="./FlopFlix.php" method="GET">
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

    <h1>Votre panier</h1>
    <table class="panier-table">
        <tr>
            <th>Film</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total</th>
        </tr>
        <?php foreach ($films as $id_film => $film_info): ?>
            <tr>
                <td><?= $film_info['film']->nom ?></td>
                <td><?= $film_info['quantite'] ?></td>
                <td><?= $film_info['film']->prix ?>€</td>
                <td><?= $film_info['quantite'] * $film_info['film']->prix ?>€</td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
