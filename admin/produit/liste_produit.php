<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $sql="SELECT * FROM produit";
        $produits= $db->query($sql)->fetchAll();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) ) {
                $id = $_GET['id'];
            
                $sql = "DELETE FROM produit WHERE id_prod = ?";
            
                try {
                    $prepare = $db->prepare($sql);
            
                    $prepare->execute([$id]);
                      header('Location: liste_produit.php');
                    
                } catch (PDOException $e) {
                    echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
                }
            } 

        }
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">id categorie</th>
      <th scope="col">libelle</th>
      <th scope="col">qantite en stock</th>
      <th scope="col">prix</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($produits as $produit) :?>
        <tr>
        <th scope="row" style="color: black;"><?php echo $produit['id_prod'] ;?></th>
        <td><?php echo $produit['id_categorie'] ;?></td>
        <td><?php echo $produit['lib_prod'] ;?></td>
        <td><?php echo $produit['qte_en_stock'] ;?></td>
        <td><?php echo $produit['prix_prod'] ;?></td>
        <td><?php echo $produit['img_prod'] ;?></td>
        <td>
           <a class="btn btn-primary" href="modif_produit.php?id=<?php echo $produit['id_prod']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_produit.php?id=<?php echo$produit['id_prod']; ?>">supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
<?php   require_once("../layout/footer.php");?>