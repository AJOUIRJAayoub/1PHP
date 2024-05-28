<?php



function getAdmin($email, $motdepasse)
{
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("SELECT id, email, motdepasse FROM admin WHERE email = ? AND motdepasse = ?");

        $req->execute(array($email, $motdepasse));
    
        if($req->rowCount()== 1){

            $data = $req->fetch();

            return $data;
        }

        else{
            return false;
        }

    }
}


function getUser($email, $motdepasse)
{
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("SELECT id, email, motdepasse FROM utilisateur WHERE email = ? AND motdepasse = ?");

        $req->execute(array($email, $motdepasse));
    
        if($req->rowCount() == 1) {
            $data = $req->fetch();
            return $data;
        } else {
            return false;
        }
    }
}



function ajouter($nom, $image, $prix, $description, $realisateur)
{
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("INSERT INTO films (nom, image, prix, description, realisateur) VALUES (?, ?, ?, ?, ?)");
        $req->execute(array($nom, $image, $prix, $description, $realisateur));
        $req->closeCursor();
    }
}




function afficher()
{
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM films ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);


        $req->closeCursor();
        
        return $data;

        
    }
}

function supprimer($id)
{
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("DELETE FROM films WHERE id=?");

        $req->execute(array($id));

    }
}


function getfilm($id)
{
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM films WHERE id=?");

        $req->execute(array($id));
    
        if($req->rowCount()== 1){

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            return $data;
        }

        else{
            return false;
        }


    }
}



function rechercher($nom)
{
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM films WHERE nom LIKE :nom OR realisateur LIKE :nom");
        $req->bindValue(':nom', '%'.$nom.'%');
        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        $req->closeCursor();
        
        return $data;
    }
}

function Ajouteraupanier($id_film, $quantite)
{
    if (require("FlopFlix-Connexion.php")) {
        $film = getfilm($id_film);
        if ($film) {
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = array();
            }

            if (isset($_SESSION['panier'][$id_film])) {
                $_SESSION['panier'][$id_film]['quantite'] += $quantite;
            } else {
                $_SESSION['panier'][$id_film] = array(
                    'id' => $id_film,
                    'nom' => $film->nom,
                    'image' => $film->image,
                    'prix' => $film->prix,
                    'quantite' => $quantite
                );
            }
        }
    }
}

function recupererFilmParId($id) {
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("INSERT INTO utilisateur (pseudo, email, motdepasse) VALUES (?, ?, ?)");

        $req->execute(array('$pseudo', '$email', '$motdepasse'));
        $req->closeCursor();
    }


    $req = $access->prepare("SELECT * FROM films WHERE id = :id");
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch(PDO::FETCH_OBJ);
}




function addUser($pseudo, $email, $motdepasse)
{
    if(require("FlopFlix-Connexion.php"))
    {
        $req = $access->prepare("INSERT INTO utilisateur (pseudo, email, motdepasse) VALUES (?, ?, ?)");

        $req->execute(array($pseudo, $email, $motdepasse));

        $req->closeCursor();
    }
}

function estConnecte() {
    return isset($_SESSION['user_id']);
}


function getFilmById($id_film)
{
    if (require("FlopFlix-Connexion.php")) {
        $req = $access->prepare("SELECT * FROM films WHERE id = ?");
        $req->execute(array($id_film));

        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_OBJ);
            return $data;
        } else {
            return false;
        }
    }
}


?>




























