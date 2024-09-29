<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
?>

   

                <h2>Liste des promotions</h2>
                <?php   
        require_once("../../connection.php");
        $sql="SELECT * FROM promotion";
        $promotions= $db->query($sql)->fetchAll();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) ) {
                $id = $_GET['id'];
            
                $sql = "DELETE FROM promotion WHERE id_promo = ?";
            
                try {
                    $prepare = $db->prepare($sql);
                    $prepare->execute([$id]);
                    header('Location: liste_promo.php');                    
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
      <th scope="col">taux</th>
      <th scope="col">date debut</th>
      <th scope="col">date fin</th>
      <th scope="col">produit</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($promotions as $promotion) :?>
        <tr>
        <th scope="row" style="color: black;"><?php echo $promotion['id_promo'] ;?></th>
        <td><?php echo $promotion['taux_promo'] ;?></td>
        <td><?php echo $promotion['date_debut'] ;?></td>
        <td><?php echo $promotion['date_fin'] ;?></td>
        <td><?php echo $promotion['id_produit'] ;?></td>
        <td>
           <a class="btn btn-primary" href="modif_promo.php?id=<?php echo $promotion['id_promo']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_promo.php?id=<?php echo$promotion['id_promo']; ?>">supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
<?php   require_once("../layout/footer.php");?>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
