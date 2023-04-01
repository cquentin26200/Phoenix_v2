<?php

namespace Travel\Models;

use Travel\Models\Travel;

/** Class UserManager **/
class TravelManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    //récupère tout les voyages

    public function showAll()
    {
        $_SESSION["type"] = $_POST["type"] ?? "All";
        $stmt = $this->bdd->prepare("SELECT * FROM voyage JOIN type ON voyage.ID_VOYAGE = type.ID_VOYAGE WHERE type.TAG_VOYAGE = ?");
        $stmt->execute(array($_SESSION["type"]));

        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Travel\Models\Travel");
        return $stmt->fetchAll();
    }

    //récupérer tous les voyages en fonction de l'id du voyage

    public function showSpecifique($slug)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM voyage WHERE ID_VOYAGE = ?");
        $stmt->execute(array($slug));

        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Travel\Models\Travel");
        return $stmt->fetchAll();
    }

    public function addTravel()
    {
        $stmt = $this->bdd->prepare("INSERT INTO reservation (id_user, email_voyage, semaine, participant, id_reservation, prix, date, nom_commande) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($_SESSION["user"]["ID_USER"], htmlentities($_POST["email_voyage"]), htmlentities($_POST["semaine"]), htmlentities($_POST["participant"]), $_POST["id_reservation"], (htmlentities($_POST["semaine"]) * htmlentities($_POST["participant"])) * $_POST["prix"], date("Y-m-d H:i:s"), $_POST["libelle"]));

        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Travel\Models\Travel");
        return $stmt->fetchAll();
    }

    public function showConfirmation($slug)
        {
            $stmt = $this->bdd->prepare("SELECT * FROM reservation WHERE id_reservation = ?");
            $stmt->execute(array($slug));
        
            $stmt->setFetchMode(\PDO::FETCH_CLASS, "Travel\Models\Reservation");
            return $stmt->fetchAll();
        }
    
        public function showAllConfirmation()
        {
            $stmt = $this->bdd->prepare("SELECT * FROM reservation");
            $stmt->execute();
        
            $stmt->setFetchMode(\PDO::FETCH_CLASS, "Travel\Models\Reservation");
            return $stmt->fetchAll();
        }
    
        public function confirmePayment()
        {
            $stmt = $this->bdd->prepare("SELECT * FROM reservation WHERE id_user = ?");
            $stmt->execute(array($_SESSION["user"]["ID_USER"]));
        
            $stmt->setFetchMode(\PDO::FETCH_CLASS, "Travel\Models\Reservation");
            $el = $stmt->fetch();
        
            $id_payement = uniqid();
        
            $stmt = $this->bdd->prepare("INSERT INTO commande (ID_PAYEMENT, ID_USER, NUM_CARTE, ADRESSE_FACTURATION, TELEPHONE, CONDITION_USE) VALUES (?, ? , ?, ?, ?, ?)");
            $stmt->execute(array($id_payement, $el->getid_user(), $_POST["num_cart"], $_POST["adress_fac"], $_POST["phone"], 1));
        
            $stmt = $this->bdd->prepare("INSERT INTO contenir (ID_PAYEMENT, ID_VOYAGE) VALUES (?, ?)");
            $stmt->execute(array($id_payement, $el->getid_reservation()));
        
            $stmt = $this->bdd->prepare("DELETE FROM reservation WHERE id_user = ?");
            $stmt->execute(array($_SESSION["user"]["ID_USER"]));
    }
}
