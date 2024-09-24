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
            
                    echo " $id supprime ";
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