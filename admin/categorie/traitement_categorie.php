<?php
require_once("../../connection.php");
if(isset($_POST['libelle'])){
    $lib = $_POST['libelle'];
    try {
        $sql= "INSERT INTO categorie (id_cat ,lib_cat) VALUES (null,?)";
        $prepare = $db->prepare($sql);
        $prepare->execute([$lib]);
        echo "ok";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
    }
}




?>


