<?php require_once("../../connection.php");

$sql="SELECT * FROM produit";
$produits= $db->query($sql)->fetchAll();

  $id = $_GET['id'];
  $sql = "SELECT * FROM promotion WHERE id_promo = ?";
  $prepare = $db->prepare($sql);
  $prepare->execute([$id]);
  $promotion = $prepare->fetch(PDO::FETCH_ASSOC);

  if(isset($_POST['taux']) && isset($_POST['date_debut']) && isset($_POST['date_fin'])  && isset($_POST['produit'])  ){
    $taux = $_POST['taux'];
    $date_debut = $_POST ['date_debut'];
    $date_fin = $_POST['date_fin'];
    $produit = $_POST['produit'];
   
    $sql = "SELECT * FROM produit WHERE id_prod = ?";
    $prepare = $db->prepare($sql);
    $prepare->execute([$produit]);
    $produit__ = $prepare->fetch(PDO::FETCH_ASSOC);
    $id1 = $produit__['id_prod'];
    $prix1 =($taux / 100 ) * $produit__['prix_initiale'];
try {
    $sql= "UPDATE promotion SET   taux_promo = ? ,id_produit = ?,date_debut = ?,date_fin  = ?  WHERE id_promo = ?";
    $prepare = $db->prepare($sql);
    $prepare->execute([ $taux,$produit, $date_debut, $date_fin ,$id]);
     $sql1 = "UPDATE produit SET prix_prod  = ? WHERE id_prod = ?";
     $stmt = $db->prepare($sql1);
     $stmt->execute([ $prix1,$id1]);
    header('Location: liste_promo.php');
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
}}
require_once('../layout/header.php');
?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> Ajout  promotion </i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="" method="POST">
                            <div class="mb-1">
                                <label  class="form-label"><h5>taux de redecction</h5></label>
                                <input type="text" class="form-control" value="<?= $promotion['taux_promo']?>" name="taux">                
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label"><h5>date debut  </h5></label>
                                <input type="date" class="form-control"  value="<?= $promotion['date_debut']?>" name="date_debut">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>date fin</h5></label>
                                <input type="date" class="form-control"  value="<?= $promotion['date_fin']?>" name="date_fin">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>produit</h5></label>
                                <select  name="produit" id="" class="form-control">
                                    <?php foreach ($produits as $produit) :?>
                                        <option value="<?= $produit['id_prod']?>"><?= $produit['lib_prod']?></option>
                                    <?php endforeach?>
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