<?php   
require_once("../../connection.php");
$id = $_GET['id'];
$sql = "SELECT * FROM detaille_commande WHERE id_commande = ?";
$prepare = $db->prepare($sql);
$prepare->execute([$id]);
$detailles = $prepare->fetchAll(PDO::FETCH_ASSOC);
require_once("../layout/header.php");
?>
<h2>commandes numero :<?= $id ?></h2>
<div class="table-responsive">
  <table class="table table-hover table-striped table-bordered shadow-lg;">
    <thead>
      <tr>
        <th scope="col">id produit</th>
        <th scope="col">prix unitaire</th>
        <th scope="col">quantite</th>
        <th scope="col">prix</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
          <?php foreach ($detailles as $detaille) :?>
          <tr>
          <th scope="row" style="color: black;"><?php echo $detaille['id_produit'] ;?></th>
          <td><?php echo $detaille['prix_unitaire'] ;?></td>
          <td><?php echo $detaille['quantite_produit'] ;?></td>
          <td><?php echo $detaille['prix'] ;?></td>
          <td>
            <a class="btn btn-primary" href="modif_detaille.php?id=<?php echo $detaille['id_detaille']; ?>">
            <i class="fas fa-edit"></i>modifier 
            </a>
            <a class="btn btn-danger" href="liste_detaille.php?id=<?php echo$detaille['id_detaille']; ?>">
            <i class="fas fa-trash-alt"></i>supprimer  </a>
            </td>
          </tr>
        <?php  endforeach ;?>
        
    </tbody>
  </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
