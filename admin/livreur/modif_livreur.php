<?php 
require_once("../../connection.php");
 $id = $_GET['id'];

 $sql = "SELECT * FROM livreur WHERE id_livreur = ?";
 $prepare = $db->prepare($sql);
 $prepare->execute([$id]);
 $livreur = $prepare->fetch(PDO::FETCH_ASSOC);

 if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) ){
    $nom = $_POST['nom'];
    $prenom =$_POST ['prenom'];
    $tel = $_POST['tel'];
     $sql = "UPDATE livreur SET nom_livreur = ? ,prenom_livreur = ?,tel_livreur = ? WHERE id_livreur = ?";
     $stmt = $db->prepare($sql);
     $stmt->execute([$nom, $prenom,  $tel,$id]);
     header("Location: liste_livreur.php");
 }
 require_once('../layout/header.php');
?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> modification   livreur </i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="modif_livreur.php" method="POST">
                            <div class="mb-1">
                                <label  class="form-label"><h5 >Prenom</h5></label>
                                <input type="text" class="form-control" value="<?php echo $livreur['prenom_livreur']; ?> " name="prenom" >
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>Nom</h5></label>
                                <input type="text" class="form-control" id="nom"value="<?php  echo $livreur['nom_livreur']; ?> " name="nom">                
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>telephone</h5></label>
                                <input type="text" class="form-control" value="<?php echo $livreur['tel_livreur']?> " name="tel">
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