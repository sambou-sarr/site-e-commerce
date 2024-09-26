<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $sql="SELECT * FROM admin";
        $admins= $db->query($sql)->fetchAll();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) ) {
                $id = $_GET['id'];
            
                $sql = "DELETE FROM admin WHERE id_admin = ?";
            
                try {
                    $prepare = $db->prepare($sql);
                    $prepare->execute([$id]);
                    header('Location: liste_admin.php');                    
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
      <th scope="col">email</th>
      <th scope="col">telephone</th>
      <th scope="col">login</th>
      <th scope="col">mot de passe</th>
      <th scope="col">statut</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($admins as $admin) :?>
        <tr>
        <th scope="row" style="color: black;"><?php echo $admin['id_admin'] ;?></th>
        <td><?php echo $admin['prenom_admin'] ;?></td>
        <td><?php echo $admin['nom_admin'] ;?></td>
        <td><?php echo $admin['email_admin'] ;?></td>
        <td><?php echo $admin['tel_admin'] ;?></td>
        <td><?php echo $admin['login_admin'] ;?></td>
        <td><?php echo $admin['password_admin'] ;?></td>
        <td><?php echo $admin['statut_admin'] ;?></td>
        <td>
           <a class="btn btn-primary" href="modif_admin.php?id=<?php echo $admin['id_admin']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_admin.php?id=<?php echo$admin['id_admin']; ?>">supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
<?php   require_once("../layout/footer.php");?>