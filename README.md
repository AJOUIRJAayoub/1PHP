# FlopFlix - Site de Vente de Films en Ligne

![FlopFlix Logo](./FlopFlix/IMG/Logo_FlopFlix.png)

## Description

FlopFlix est une plateforme web de vente de films en ligne développée en PHP/MySQL. Elle permet aux utilisateurs de parcourir un catalogue de films par catégorie, de rechercher des films spécifiques, et de les acheter. Le site dispose également d'une interface d'administration pour gérer le catalogue de films.

## Fonctionnalités

### Pour les utilisateurs
- **Navigation par catégories** : Films d'horreur, comédie, aventure, action, science-fiction, drama et sport
- **Recherche de films** : Par titre ou réalisateur
- **Système d'authentification** : Inscription et connexion des utilisateurs
- **Panier d'achat** : Ajout de films au panier (nécessite une connexion)
- **Fiche détaillée des films** : Affichage des informations complètes et possibilité de laisser un avis
- **Interface responsive** : Design adapté aux différents appareils

### Pour les administrateurs
- **Gestion du catalogue** : Ajout et suppression de films
- **Interface d'administration sécurisée** : Accès protégé par authentification
- **Vue d'ensemble** : Affichage de tous les films du catalogue

## Technologies utilisées

- **Frontend** : HTML5, CSS3
- **Backend** : PHP 7+
- **Base de données** : MySQL
- **Serveur** : Apache (WAMP/XAMPP recommandé)

## Structure du projet

```
FlopFlix/
├── .idea/                    # Fichiers de configuration IDE
├── Bdd/                      # Scripts SQL
│   └── flopflix.sql         # Structure et données de la base
├── FlopFlix/                # Dossier principal de l'application
│   ├── IMG/                 # Images et logos
│   │   └── Logo_FlopFlix.png
│   ├── admin/               # Interface d'administration
│   │   ├── AjouterUnFilm.php
│   │   ├── AjouterUnFilm.css
│   │   ├── SupprimerUnFilm.php
│   │   ├── SupprimerUnFilm.css
│   │   ├── ToutLesFilms.php
│   │   ├── ToutLesFilms.css
│   │   └── Deconnexion.php
│   ├── config/              # Configuration et fonctions
│   │   ├── FlopFlix-Commande.php
│   │   └── FlopFlix-Connexion.php
│   ├── FlopFlix.php         # Page d'accueil
│   ├── FlopFlix.css         # Styles principaux
│   ├── Film-*.php           # Pages par catégorie
│   ├── Connexion.php        # Page de connexion
│   ├── Inscription.php      # Page d'inscription
│   ├── Panier.php          # Gestion du panier
│   ├── Panier.css          # Styles du panier
│   ├── presentation-film.php # Détail d'un film
│   ├── presentation-film.css
│   └── deconnexion.php      # Déconnexion utilisateur
└── README.md                # Ce fichier
```

## Installation

### Prérequis
- Serveur web Apache avec PHP 7+ (WAMP, XAMPP, MAMP, etc.)
- MySQL 5.7+
- Navigateur web moderne

### Étapes d'installation

1. **Cloner ou télécharger le projet**
   ```bash
   git clone https://github.com/AJOURIJAayoub/FlopFlix.git
   ```

2. **Configurer le serveur web**
   - Placez le dossier du projet dans le répertoire web de votre serveur
     - WAMP : `C:\wamp64\www\`
     - XAMPP : `C:\xampp\htdocs\`

3. **Créer la base de données**
   - Ouvrez phpMyAdmin
   - Créez une nouvelle base de données nommée `flopflix`
   - Importez le fichier `Bdd/flopflix.sql`

4. **Configurer la connexion à la base de données**
   - Ouvrez le fichier `FlopFlix/config/FlopFlix-Connexion.php`
   - Modifiez les paramètres de connexion si nécessaire :
   ```php
   $access = new pdo("mysql:host=localhost;dbname=flopflix;charset=utf8","root","");
   ```

5. **Accéder au site**
   - Ouvrez votre navigateur
   - Accédez à : `http://localhost/FlopFlix/FlopFlix/FlopFlix.php`

## Comptes par défaut

### Administrateur
- **Email** : admin@flopflix.com
- **Mot de passe** : 1

### Utilisateur test
- **Email** : ayoub@user.com
- **Mot de passe** : 1

## Aperçu des fonctionnalités

### Base de données
La base de données contient 3 tables principales :
- **admin** : Stockage des administrateurs
- **films** : Catalogue des films (id, nom, image, prix, description, réalisateur)
- **utilisateur** : Informations des utilisateurs inscrits

### Films préchargés
Le site est livré avec 5 films exemples :
- Dune - Deuxième partie
- The Fall Guy
- Blue & Compagnie
- La Planète des Singes : Le Nouveau Royaume
- Les Cartes du mal

## Sécurité

- Sessions PHP pour l'authentification
- Protection des pages d'administration
- Échappement des données avec `htmlspecialchars()` et `strip_tags()`
- Requêtes préparées PDO pour éviter les injections SQL

## Notes importantes

1. **Mot de passe** : Dans la version actuelle, les mots de passe sont stockés en clair. Pour un environnement de production, implémentez un système de hachage (password_hash/password_verify).

2. **Validation des données** : Ajoutez des validations supplémentaires côté client et serveur.

3. **Gestion des images** : Les images sont actuellement stockées via des URLs externes. Considérez l'upload local pour plus de contrôle.

4. **Panier** : Le panier est stocké en session. Pour une persistance, envisagez de le stocker en base de données.

## Contribution

Les contributions sont les bienvenues ! N'hésitez pas à :
1. Fork le projet
2. Créer une branche pour votre fonctionnalité
3. Commit vos changements
4. Push vers la branche
5. Ouvrir une Pull Request

## Licence

Ce projet est à des fins éducatives. Tous droits réservés.
