<?php
require_once("../../connection.php");
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['tel'])) {
        $nom = $_POST['nom'];
        $prenom =$_POST ['prenom'];
        $tel = $_POST['tel'];


        try {
            $sql= "INSERT INTO livreur (id_livreur ,nom_livreur ,prenom_livreur ,tel_livreur ) VALUES (null,? ,? ,? )";
            $prepare = $db->prepare($sql);
            $prepare->execute([$nom, $prenom,  $tel]);
            header('Location: liste_livreur.php');
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
        }
}

?>