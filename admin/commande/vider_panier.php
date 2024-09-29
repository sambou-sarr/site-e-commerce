<?php
session_start();
if (isset($_SESSION['tab'])) {
    unset($_SESSION['tab']);
}
header('Location: ajout_commande.php');