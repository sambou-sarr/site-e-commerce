<?php
require_once("../../connection.php");
$sql="SELECT * FROM categorie";
$categories= $db->query($sql)->fetchAll();
$id = $_GET['id'];
$sql = "SELECT * FROM produit WHERE id_prod = ?";
$prepare = $db->prepare($sql);
$prepare->execute([$id]);
$produit = $prepare->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['libelle']) && isset($_POST['qute']) && isset($_POST['prix'])  && isset($_POST['img']) && isset($_POST['categorie']) ) {
    $libelle = $_POST['libelle'];
    $quantite = $_POST ['qute'];
    $image = $_POST['img'];
    $categorie = $_POST['categorie'];
    $prix = $_POST['prix'];  
    $sql = "UPDATE produit SET id_categorie = ? ,lib_prod  = ?,qte_en_stock = ?,prix_prod  = ?,img_prod = ? WHERE id_prod = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$categorie, $libelle, $quantite, $prix,$image,$id]);
    header("Location: liste_produit.php");
    exit();
}require_once('../layout/header.php');
?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> Ajout  produit </i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="" method="POST">
                            <div class="mb-1">
                                <label  class="form-label"><h5 >libelle</h5></label>
                                <input type="text" class="form-control" value="<?= $produit['lib_prod'] ?>" name="libelle" >
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>Quantite en stock</h5></label>
                                <input type="text" class="form-control"value="<?= $produit['qte_en_stock'] ?>" name="qute">                
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label"><h5>Prix </h5></label>
                                <input type="number" class="form-control" value="<?= $produit['prix_prod'] ?>" name="prix">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>image</h5></label>
                                <input type="file" class="form-control" value="<?= $produit['img_prod'] ?>" name="img">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>categorie</h5></label>
                                <select name="categorie" id="" class="form-control">
                                    <?php foreach ($categories as $categorie) :?>
                                        <option value="<?= $categorie['id_cat']?>"><?= $categorie['lib_cat']?></option>
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