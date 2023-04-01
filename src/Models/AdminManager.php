<?php

namespace Travel\Models;

use Travel\Models\Travel;

/** Class UserManager **/
class AdminManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function find($name, $userId)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM post WHERE Title = ? AND Author = ?");
        $stmt->execute(array(
            $name,
            $userId
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Blog\Models\Blog");

        return $stmt->fetch();
    }

    public function getTags()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM tag");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Travel\Models\Travel");

        return $stmt->fetchAll();
    }

    public function store($id, $libelle, $description, $prix, $image)
    {
        $stmt = $this->bdd->prepare("INSERT INTO voyage(ID_VOYAGE, LIBELLE_VOYAGE, DESC_VOYAGE, PRIX_VOYAGE, IMAGE_VOYAGE) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array(
            $id,
            $libelle,
            $description,
            $prix,
            $image,
        ));

        $stmt = $this->bdd->prepare("INSERT INTO type (ID_VOYAGE, TAG_VOYAGE) VALUES (?, ?)");
        $stmt->execute(array($id, $_POST["tag"]));
    }

    // public function update($slug)
    // {
    //     $stmt = $this->bdd->prepare("UPDATE post SET Title = ? AND Comment = ? WHERE Title = ? AND Author = ?");
    //     $stmt->execute(array(
    //         htmlentities($_POST['namePost']),
    //         htmlentities($_POST['nameComment']),
    //         htmlentities($slug),
    //         $_SESSION["user"]["id"]
    //     ));
    // }

    public function delete($id)
    {
        $stmt = $this->bdd->prepare('DELETE FROM `voyage` WHERE ID_VOYAGE = :id');
        $stmt->execute(array(
            "id" => htmlentities($id),
        ));
    }
}
