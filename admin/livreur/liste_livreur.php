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

   

                <h2>Liste des livreurs</h2>
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
</body>
</html>