<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $sql="SELECT * FROM user";
        $users= $db->query($sql)->fetchAll();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) ) {
                $id = $_GET['id'];
            
                $sql = "DELETE FROM user WHERE id_user = ?";
            
                try {
                    $prepare = $db->prepare($sql);
                    $prepare->execute([$id]);
                    header('Location: liste_user.php');                    
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
      <th scope="col">adresse</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($users as $user) :?>
        <tr>
        <th scope="row" style="color: black;"><?php echo $user['id_user'] ;?></th>
        <td><?php echo $user['prenom_user'] ;?></td>
        <td><?php echo $user['nom_user'] ;?></td>
        <td><?php echo $user['email_user'] ;?></td>
        <td><?php echo $user['tel_user'] ;?></td>
        <td><?php echo $user['login_user'] ;?></td>
        <td><?php echo $user['password_user'] ;?></td>
        <td><?php echo $user['adresse_user'] ;?></td>
        <td>
           <a class="btn btn-primary" href="modif_user.php?id=<?php echo $user['id_user']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_user.php?id=<?php echo$user['id_user']; ?>">supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
<?php   require_once("../layout/footer.php");?>