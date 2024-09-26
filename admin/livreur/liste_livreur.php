<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $sql="SELECT * FROM livreur";
        $livreurs= $db->query($sql)->fetchAll();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) ) {
                $id = $_GET['id'];
                $sql = "DELETE FROM livreur WHERE id_livreur = ?";
                try {
                    $prepare = $db->prepare($sql);
                    $prepare->execute([$id]);
                    header('Location:liste_livreur');
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
      <th scope="col">prenom</th>
      <th scope="col">nom</th>
      <th scope="col">telephone</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($livreurs as $livreur) :?>
        <tr>
        <th scope="row" style="color: black;"><?php echo $livreur['id_livreur'] ;?></th>
        <td><?php echo $livreur['prenom_livreur'] ;?></td>
        <td><?php echo $livreur['nom_livreur'] ;?></td>
        <td><?php echo $livreur['tel_livreur'] ;?></td>
        <td>
           <a class="btn btn-primary" href="modif_livreur.php?id=<?php echo $livreur['id_livreur']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_livreur.php?id=<?php echo $livreur['id_livreur']; ?>">supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
<?php   require_once("../layout/footer.php");?>