<?php 
     require_once("../../connection.php");
     $sql="SELECT * FROM categorie";
     $categories= $db->query($sql)->fetchAll();

     if(isset($_POST['taux']) && isset($_POST['date_debut']) && isset($_POST['date_fin'])  && isset($_POST['produit'])  ){
        $taux = $_POST['taux'];
        $date_debut = $_POST ['date_debut'];
        $date_fin = $_POST['date_fin'];
        $produit = $_POST['produit'];
       
        $sql = "SELECT * FROM produit WHERE id_prod = ?";
        $prepare = $db->prepare($sql);
        $prepare->execute([$produit]);
        $produit__ = $prepare->fetch(PDO::FETCH_ASSOC);
        $id1 = $produit__['id_prod'];
        var_dump($produit__['prix_prod']);
        var_dump( $prix1 =($taux / 100 ) * $produit__['prix_prod']) ;
      
    try {
        $sql= "INSERT INTO promotion  (id_promo ,taux_promo ,id_produit,date_debut ,date_fin  ) VALUES (null,? ,? ,? ,?)";
        $prepare = $db->prepare($sql);
        $prepare->execute([ $taux,$produit, $date_debut, $date_fin ]);
         $sql1 = "UPDATE produit SET prix_prod  = ? WHERE id_prod = ?";
         $stmt = $db->prepare($sql1);
         $stmt->execute([ $prix1,$id1]);
        header('Location: liste_promo.php');
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
    }
}


if (isset($_POST['libelle']) && isset($_POST['qute']) && isset($_POST['prix'])  && isset($_POST['img']) && isset($_POST['categorie']) ) {
    $libelle = $_POST['libelle'];
    $quantite = $_POST ['qute'];
    $image = $_POST['img'];
    $categorie = $_POST['categorie'];
    $prix = $_POST['prix'];  

    
    header("Location: liste_produit.php");
    exit();
}