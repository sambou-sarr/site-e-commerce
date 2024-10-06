<?php 
     require_once("../../connection.php");
     $sql="SELECT * FROM categorie";
     $categories= $db->query($sql)->fetchAll();
     if(isset($_POST['libelle']) && isset($_POST['qute']) && isset($_POST['prix'])  && isset($_POST['img']) && isset($_POST['categorie']) ){
        $libelle = $_POST['libelle'];
        $quantite = $_POST ['qute'];
        $image = $_POST['img'];
        $categorie = $_POST['categorie'];
        $prix = $_POST['prix'];
        $prix_initial = $prix;
    try {
        $sql= "INSERT INTO produit  (id_prod ,id_categorie ,lib_prod ,qte_en_stock ,prix_prod ,img_prod,prix_initiale ) VALUES (null,? ,? ,? ,? ,?,?)";
        $prepare = $db->prepare($sql);
        $prepare->execute([$categorie, $libelle, $quantite, $prix,$image,$prix_initial ]);
        header('Location: liste_produit.php');
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
    }
}