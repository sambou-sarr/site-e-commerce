<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $sql="SELECT * FROM categorie";
        $categories= $db->query($sql)->fetchAll();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) ) {
                $id = $_GET['id'];
            
                // Requête de suppression avec un placeholder
                $sql = "DELETE FROM categorie WHERE id_cat = ?";
            
                try {
                    // Préparation de la requête
                    $prepare = $db->prepare($sql);
            
                    // Exécution de la requête avec le paramètre
                    $prepare->execute([$id]);
            
                    header('location: liste_categorie.php');
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


<h2>Liste des catégories</h2>
<div class="mb-3">
    <a class="btn btn-success" href="ajout_categorie.php">Ajouter une catégorie</a>
</div>
<table class="table">s
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">libelle</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($categories as $categorie) :?>
        <tr>
        <th scope="row"><?php echo $categorie['id_cat'] ;?></th>
        <td><?php echo $categorie['lib_cat'] ;?></td>
        <td>
           <a class="btn btn-primary" href="modif_categorie.php?id=<?php echo $categorie['id_cat']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_categorie.php?id=<?php echo$categorie['id_cat']; ?>">supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
<?php   require_once("../layout/footer.php");?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

