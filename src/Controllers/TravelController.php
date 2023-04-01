<?php

namespace Travel\Controllers;

use Travel\Models\TravelManager;
use Travel\Validator;

/** Class UserController **/
class TravelController
{
    private $manager;

    public function __construct()
    {
        $this->manager = new TravelManager();
    }

    public function index()
    {
        if (!isset($_SESSION["user"]["ID_USER"])) {
            header("Location: /login");
            die();
        }
        require VIEWS . 'Pages/homepage.php';
    }

    public function cart()
    {
        if (!isset($_SESSION["user"]["ID_USER"])) {
            header("Location: /login");
            die();
        }
        $reservation = $this->manager->showAllConfirmation();
        require VIEWS . 'Pages/cart.php';
    }

    public function payment()
    {
        if (str_contains($_SERVER["REQUEST_URI"], "error")) {
            $error = "error";
        }
        require VIEWS . 'Pages/payment.php';
    }

    public function confirmPayment()
    {
        if (!isset($_POST["check"]) || empty($_POST["phone"]) || empty($_POST["num_cart"]) || empty($_POST["adress_fac"])) {
            header("Location: /cart/error");
        } else {
            header("Location: /cart");
            $this->manager->confirmePayment();
        }
    }

    public function reservation($slug)
    {
        if (!isset($_SESSION["user"]["ID_USER"])) {
            header("Location: /login");
            die();
        }
        $travel = $this->manager->showSpecifique($slug);
        $showAll = $this->manager->showAll();
        if (str_contains($_SERVER["REQUEST_URI"], "error")) {
            $error = "error";
        }
        require VIEWS . 'Pages/reservation.php';
    }

    public function addConfirmation()
    {
        if (!isset($_SESSION["user"]["ID_USER"])) {
            header("Location: /login");
            die();
        }
        $id = $_POST["id_reservation"];
        if ($_POST["semaine"] == 0 || $_POST["participant"] == 0 || $_POST["semaine"] == "" || $_POST["participant"] == "" || $_POST["email_voyage"] == "") {
            header("Location: /confirmation/show/error/" . $id);
        } else {
            header("Location: /confirmation/show/" . $id);
        }
        $this->manager->addTravel();
    }

    public function showConfirmation($slug)
    {
        if (!isset($_SESSION["user"]["ID_USER"])) {
            header("Location: /login");
            die();
        }
        $showAll = $this->manager->showAll();
        $reservation = $this->manager->showConfirmation($slug);
        require VIEWS . 'Pages/confirmation.php';
    }

    public function showCatalogue()
    {
        if (!isset($_SESSION["user"]["ID_USER"])) {
            header("Location: /login");
            die();
        }
        $filter = $_POST['type'] ?? "All";
        $showAll = $this->manager->showAll();
        require VIEWS . 'Pages/catalogue.php';
        require VIEWS . "includes/allTravel.php";
    }
}
