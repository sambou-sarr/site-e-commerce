<?php require_once("../../connection.php");
 if(isset($_POST['commande']) && isset($_POST['date']) && isset($_POST['livreur'])  && isset($_POST['adresse'])  ){
    $commande = $_POST['commande'];
    $date = $_POST ['date'];
    $livreur = $_POST['livreur'];
    $adresse = $_POST['adresse'];
try {
    $sql= "INSERT INTO livraison  (id_livraison ,id_commande ,date_livraison ,id_livreur ,adresse_livraison) VALUES (null,? ,? ,? ,? )";
    $prepare = $db->prepare($sql);
    $prepare->execute([$commande,$date,$livreur, $adresse ]);
   
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
}
header('loction: liste_livraison.php');
}