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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
                <h2>Liste des produits</h2>

                <div class="mb-3">
<a class="btn btn-success" href="ajout_produit.php">Ajouter une produit</a>
</div>
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
       <td><img src="images/<?php echo $produit['img_prod']; ?>" alt="image produit" style="width: 100px; height: auto;"></td>
        <td>
           <a class="btn btn-primary" href="modif_produit.php?id=<?php echo $produit['id_prod']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_produit.php?id=<?php echo$produit['id_prod']; ?>">supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
<?php   require_once("../layout/footer.php");?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
