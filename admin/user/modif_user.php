<?php require_once("../../connection.php");
  $id = $_GET['id'];

  $sql = "SELECT * FROM user WHERE id_user = ?";
  $prepare = $db->prepare($sql);
  $prepare->execute([$id]);
  $user = $prepare->fetch(PDO::FETCH_ASSOC);

  if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel'])  && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['login']) && isset($_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom =$_POST ['prenom'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $login = $_POST['login'];
        $password = $_POST['password'];
      $sql = "UPDATE user SET nom_user = ? ,prenom_user = ?,email_user = ?,tel_user = ?,login_user = ?,password_user = ?,adresse_user= ? WHERE id_user = ?";
      $stmt = $db->prepare($sql);
      $stmt->execute([$nom, $prenom, $email, $tel,$login, $password, $adresse ,$id]);
      
      header("Location: liste_user.php");
      exit();
  }
require_once('../layout/header.php');
?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> Ajout  commande </i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="" method="POST">
                            <div class="mb-1">
                                <label  class="form-label"><h5 >Prenom</h5></label>
                                <input type="hidden" class="form-control"  name="id" value="<?php echo $user['id_user']; ?>">
                                <input type="text" class="form-control"  name="prenom" value="<?php echo $user['prenom_user']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>Nom</h5></label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user['nom_user']; ?>">                
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label"><h5>Email </h5></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email_user']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>telephone</h5></label>
                                <input type="number" class="form-control"  name="tel" value="<?php echo $user['tel_user']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>login</h5></label>
                                <input type="text" class="form-control"  name="login" value="<?php echo $user['login_user']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>password</h5></label>
                                <input type="password" class="form-control"  name="password" value="<?php echo $user['password_user']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>adresse</h5></label>
                                <input type="text" class="form-control"  name="adresse" value="<?php echo $user['adresse_user']; ?>">
                            </div>
                            <div class="mb-1">
                                <button type="submit" class="btn btn-success">valider</button>
                            </div>            
                        </form>
                </div>
            </div>                        
        </div>
    </div>
        <div class="col-md-4"> 
        </div>
    </div>
<?php require_once('../layout/footer.php'); ?>