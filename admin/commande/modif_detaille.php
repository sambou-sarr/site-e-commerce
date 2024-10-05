<?php
 require_once("../../connection.php");
$sql="SELECT * FROM produit";
$produits= $db->query($sql)->fetchAll();
$id = $_GET['id'];
$sql = "SELECT * FROM detaille_commande WHERE id_detaille = ?";
$prepare = $db->prepare($sql);
$prepare->execute([$id]);
$detaille = $prepare->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['produit']) && isset($_POST['qute'])){
    $id_prod=$_POST['produit'];
    $sql1 = "SELECT * FROM produit WHERE id_prod = ?";
    $prepare = $db->prepare($sql1);
    $prepare->execute([$id_prod]);
    $produit = $prepare->fetch(PDO::FETCH_ASSOC);
    $prix_prod = $produit['prix_prod'];
    $quantite = $_POST['qute'];
    $prix= $quantite * $prix_prod;
    $sql2 = "UPDATE detaille_commande SET id_produit = ?, prix_unitaire = ?, quantite_produit = ?,prix = ? WHERE id_detaille = ?";
    $stmt = $db->prepare($sql2);
    $stmt->execute([$id_prod,$prix_prod,$quantite,$prix,$id]);
    header('Location: voir_commande.php?id='.$detaille['id_commande']);
}
require_once('../layout/header.php');
?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> modification commade</i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="" method="POST">
                            <div class="mb-1">
                                <label ><h4>Produit </h4></label>
                                <select name="produit"  class="form-control">
                                    <?php foreach ($produits as $produit) : ?>
                                    <option value="<?= $produit['id_prod']?>" > <?= $produit['lib_prod']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>Quantite e</h5></label>
                                <input type="text" class="form-control" name="qute" value="<?= $detaille['quantite_produit']?>">                
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