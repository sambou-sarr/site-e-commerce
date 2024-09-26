<?php require_once("../../connection.php");
require_once('../layout/header.php');
  $id = $_GET['id'];

  $sql = "SELECT * FROM admin WHERE id_admin = ?";
  $prepare = $db->prepare($sql);
  $prepare->execute([$id]);
  $admin = $prepare->fetch(PDO::FETCH_ASSOC);

  if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel'])  && isset($_POST['email']) && isset($_POST['statut']) && isset($_POST['login']) && isset($_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom =$_POST ['prenom'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $statut = $_POST['statut'];
        $login = $_POST['login'];
        $password = $_POST['password'];
      $sql = "UPDATE admin SET nom_admin = ? ,prenom_admin = ?,email_admin = ?,tel_admin = ?,login_admin = ?,password_admin = ?,statut_admin= ? WHERE id_admin = ?";
      $stmt = $db->prepare($sql);
      $stmt->execute([$nom, $prenom, $email, $tel,$login, $password, $statut ,$id]);
      
      header("Location: liste_admin.php");
      exit();
  }
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
                                <input type="hidden" class="form-control"  name="id" value="<?php echo $admin['id_admin']; ?>">
                                <input type="text" class="form-control"  name="prenom" value="<?php echo $admin['prenom_admin']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>Nom</h5></label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $admin['nom_admin']; ?>">                
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label"><h5>Email </h5></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email_admin']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>telephone</h5></label>
                                <input type="number" class="form-control"  name="tel" value="<?php echo $admin['tel_admin']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>login</h5></label>
                                <input type="text" class="form-control"  name="login" value="<?php echo $admin['login_admin']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>password</h5></label>
                                <input type="password" class="form-control"  name="password" value="<?php echo $admin['password_admin']; ?>">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>statut</h5></label>
                                <select name="statut" id="" class="form-control">
                                        <option value="<?php echo $admin['statut_admin']; ?>" selected ><?php echo $admin['statut_admin']; ?></option>
                                        <option value="admin">admin</option>
                                        <option value="super">super</option>
                                </select>
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