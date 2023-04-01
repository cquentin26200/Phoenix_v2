<?php

namespace Travel\Controllers;

use Travel\Models\AdminManager;
use Travel\Models\TravelManager;

/** Class UserController **/
class AdminController
{
    private $manager;
    private $travel;
    private $img;

    public function __construct()
    {
        $this->manager = new AdminManager();
        $this->travel = new TravelManager();
    }

    public function index()
    {
        if (!isset($_SESSION["user"]["Admin"]) || $_SESSION["user"]["Admin"] === 0) {
            header("Location: /catalogue");
            die();
        }
        $tag = $this->manager->getTags();
        $voyages = $this->travel->showAll();
        require VIEWS . 'Pages/admin.php';
    }

    //_________________________________________________________________________________________________________________

    public function verifFile()
    {
        if (!isset($_SESSION["user"]["Admin"]) || $_SESSION["user"]["Admin"] === 0) {
            header("Location: /catalogue");
            die();
        }

        $uid = uniqid();
        print(pathinfo($_FILES["img"]["name"]));
        $img = $uid . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        $uidAndExtension = $uid . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        if ($_FILES['img']['error']) {
            switch ($_FILES['file']['error']) {
                case 1: // UPLOAD_ERR_INI_SIZE
                    echo "La taille du fichier est plus grande que la limite autorisée par le serveur
(paramètre upload_max_filesize du fichier php.ini).";
                    break;
                case 2: // UPLOAD_ERR_FORM_SIZE
                    echo "La taille du fichier est plus grande que la limite autorisée par le
formulaire (paramètre post_max_size du fichier php.ini).";
                    break;
                case 3: // UPLOAD_ERR_PARTIAL
                    echo "L'envoi du fichier a été interrompu pendant le transfert.";
                    break;
                case 4: // UPLOAD_ERR_NO_FILE
                    echo "La taille du fichier que vous avez envoyé est nulle.";
                    echo "<a href='form.php'>Retour au formulaire</a>";
                    break;
            }
        } else {
            //si il n'ya pas d'erreur alors $_FILES['nom_du_fichier']['error'] vaut 0

            if ((isset($_FILES['img']['name']) && ($_FILES['img']['error'] == UPLOAD_ERR_OK))) {
                $chemin_destination = 'assets/img/';
                //déplacement du fichier du répertoire temporaire (stocké par défaut) dans le répertoire de destination avec la fonction
                $fichier_uploadé = $uidAndExtension;
                move_uploaded_file($fichier_uploadé, $chemin_destination);
                move_uploaded_file($_FILES['img']['tmp_name'], $chemin_destination . $uidAndExtension);
                $this->img = $img;
            } else {
                echo "Le fichier n'a pas pu être copié dans le répertoire fichiers.";
            }
        }
    }

    public function store()
    {
        if (!isset($_SESSION["user"]["Admin"]) || $_SESSION["user"]["Admin"] === 0) {
            header("Location: /catalogue");
            die();
        }

        $id = uniqid();
        $libelle = htmlentities($_POST['libelle']);
        $description = htmlentities($_POST['desc']);
        $prix = htmlentities($_POST['prix']);
        $this->verifFile();
        $this->manager->store($id, $libelle, $description, $prix, $this->img);
        header("Location: /admin");
    }

    public function delete($id)
    {
        if (!isset($_SESSION["user"]["Admin"]) || $_SESSION["user"]["Admin"] === 0) {
            header("Location: /catalogue");
            die();
        }
        // $id = $_GET["id"];
        // Suppression dans la base de donnée
        $this->manager->delete($id);
        header("Location: /admin");
    }
}
