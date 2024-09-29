<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $id = $_GET['id'];
$sql = "SELECT * FROM detaille_commande WHERE id_commande = ?";
$prepare = $db->prepare($sql);
$prepare->execute([$id]);
$detailles = $prepare->fetchAll(PDO::FETCH_ASSOC);

?>

    

                <h2>commandes numero :<?= $id?></h2>
                <table class="table">
  <thead>
    <tr>
      <th scope="col">id produit</th>
      <th scope="col">prix unitaire</th>
      <th scope="col">quantite</th>
      <th scope="col">prix</th>
    </tr>
  </thead>
  <tbody>
        <?php foreach ($detailles as $detaille) :?>
        <tr>
        <th scope="row" style="color: black;"><?php echo $detaille['id_produit'] ;?></th>
        <td><?php echo $detaille['prix_unitaire'] ;?></td>
        <td><?php echo $detaille['quantite_produit'] ;?></td>
        <td><?php echo $detaille['prix'] ;?></td>
        
        </tr>
      <?php  endforeach ;?>
      
  </tbody>
</table>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
