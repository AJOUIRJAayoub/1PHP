-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 21 mai 2024 à 13:53
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `flopflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `motdepasse`) VALUES
(1, 'admin@flopflix.com', '1');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `realisateur` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `nom`, `image`, `prix`, `description`, `realisateur`) VALUES
(1, 'Dune - Deuxième partie', 'https://media.senscritique.com/media/000021882399/300/dune_deuxieme_partie.png', 23.00, 'Dans DUNE : DEUXIÈME PARTIE, Paul Atreides s’unit à Chani et aux Fremen pour mener la révolte contre ceux qui ont anéanti sa famille. Hanté par de sombres prémonitions, il se trouve confronté au plus grand des dilemmes : choisir entre l’amour de sa vie et le destin de l’univers.', 'Denis Villeneuve'),
(2, 'The Fall Guy', 'https://fr.web.img5.acsta.net/c_310_420/o_club-allocine-2024-310x420.png_0_se/img/5e/4c/5e4c721cb706ca59d93229058f76f056.jpg', 28.00, 'C&#039;est l’histoire d’un cascadeur, et comme tous les cascadeurs, il se fait tirer dessus, exploser, écraser, jeter par les fenêtres et tombe toujours de plus en plus haut… pour le plus grand plaisir du public. Après un accident qui a failli mettre fin à sa carrière, ce héros anonyme du cinéma va devoir retrouver une star portée disparue, déjouer un complot et tenter de reconquérir la femme de sa vie tout en bravant la mort tous les jours sur les plateaux. Que pourrait-il lui arriver de pire ?', 'David Leitch'),
(3, 'Blue &amp; Compagnie', 'https://fr.web.img4.acsta.net/c_310_420/img/12/61/12612147c1154fb7100c448ac100cafa.jpg', 22.00, 'Bea, une jeune fille, découvre un jour qu&#039;elle peut voir les amis imaginaires de tout le monde. Commence alors une aventure magique pour reconnecter chaque enfant à son ami imaginaire oublié.', 'John Krasinski'),
(4, 'La Planète des Singes : Le Nouveau Royaume', 'https://fr.web.img2.acsta.net/c_310_420/pictures/23/11/03/09/01/4866574.jpg', 21.00, 'Plusieurs générations après le règne de César, les singes ont définitivement pris le pouvoir. Les humains, quant à eux, ont régressé à l&#039;état sauvage et vivent en retrait. Alors qu&#039;un nouveau chef tyrannique construit peu à peu son empire, un jeune singe entreprend un périlleux voyage qui l&#039;amènera à questionner tout ce qu&#039;il sait du passé et à faire des choix qui définiront l&#039;avenir des singes et des humains...', 'Wes Ball'),
(5, 'Les Cartes du mal', 'https://fr.web.img6.acsta.net/c_310_420/pictures/24/03/07/09/51/3799182.jpg', 20.00, 'Quand une bande d&#039;amis transgresse sans scrupules les règles du tirage du Tarot - &quot; Suis une seule règle, évite le danger. Ne tire jamais des cartes que tu as trouvées. &quot; - ils libèrent à leur insu un esprit maléfique piégé dans les cartes maudites. Un par un, ils découvrent le sort qui les attend, et se retrouvent dans une course contre la mort pour échapper aux prédictions de leur tirage.', 'Anna Halberg, Spenser Cohen');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
(1, 'AYOUB', 'ayoub@user.com', '1'),
(2, '$pseudo', '$email', '$motdepasse');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
