<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $sql="SELECT * FROM commande";
        $commandes= $db->query($sql)->fetchAll();
?>

    

                <h2>Liste des commandes</h2>
                <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">id utilisatuer</th>
      <th scope="col">etat de la commande</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($commandes as $commande) :?>
        <tr>
        <th scope="row" style="color: black;"><?php echo $commande['id_cmd'] ;?></th>
        <td><?php echo $commande['id_utilisateur'] ;?></td>
        <td><?php echo $commande['etat_cmd'] ;?></td>
     
        <td>
           <a class="btn btn-primary" href="modif_commande.php?id=<?php echo $commande['id_cmd']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_commande.php?id=<?php echo$commande['id_cmd']; ?>">supprimer  </a>
           <a class="btn btn-light" href="voir_commande.php?id=<?php echo$commande['id_cmd']; ?>">voir plus  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
