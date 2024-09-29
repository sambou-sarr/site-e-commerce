<?php 
     require_once("../../connection.php");
     session_start();
     $etat = "en attente";
     $id_user = $_SESSION['tab']['id_user'][0];
     $sql = "INSERT INTO commande (id_cmd, id_utilisateur,  etat_cmd) VALUES (null,? ,?) ";
     $prepare = $db->prepare($sql);
     $prepare->execute([$id_user, $etat ]);
    $id_commande = $db->lastInsertId();
for ($i=0; $i <count($_SESSION['tab']['id_produit']) ; $i++) { 
    $id_produit = $_SESSION['tab']['id_produit'][$i];
    $prix_u = $_SESSION['tab']['prix_unitaire'][$i];
    $quantite = $_SESSION['tab']['quantite'][$i];
    $prix = $_SESSION['tab']['prix'][$i];

    $sql = "INSERT INTO detaille_commande (id_detaille ,id_commande,  id_produit ,prix_unitaire ,quantite_produit, prix) VALUES (null,? ,? ,? ,?,?) ";
    $prepare = $db->prepare($sql);
    $prepare->execute([$id_commande, $id_produit, $prix_u, $quantite, $prix]);
    header('location: liste_commande.php');
}