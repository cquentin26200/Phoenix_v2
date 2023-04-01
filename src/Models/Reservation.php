<?php

namespace Travel\Models;

/** Class User **/
class Reservation
{
    private $email_voyage;
    private $semaine;
    private $participant;
    private $prix;
    private $id_reservation;
    private $date;
    private $nom_commande;
    private $id_user;

    public function getid_user()
    {
        return $this->id_user;
    }

    public function getnom_commande()
    {
        return $this->nom_commande;
    }

    public function getdate()
    {
        return $this->date;
    }

    public function getid_reservation()
    {
        return $this->id_reservation;
    }

    public function getprix()
    {
        return $this->prix;
    }

    public function getemail_voyage()
    {
        return $this->email_voyage;
    }

    public function getsemaine()
    {
        return $this->semaine;
    }

    public function getparticipant()
    {
        return $this->participant;
    }

    public function setid_user($id_user)
    {
        $this->id_user = $id_user;
    }

    public function setnom_commande($nom_commande)
    {
        $this->nom_commande = $nom_commande;
    }

    public function setdate($date)
    {
        $this->date = $date;
    }

    public function setid_reservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;
    }

    public function setprix($prix)
    {
        $this->prix = $prix;
    }

    public function setemail_voyage($email_voyage)
    {
        $this->email_voyage = $email_voyage;
    }

    public function setsemaine($semaine)
    {
        $this->semaine = $semaine;
    }

    public function setparticipant($participant)
    {
        $this->participant = $participant;
    }
}
