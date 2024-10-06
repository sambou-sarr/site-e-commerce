<?php
require_once("traitement_promo.php");
$sql="SELECT * FROM produit";
$produits= $db->query($sql)->fetchAll();
require_once('../layout/header.php');
?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> Ajout  promotion </i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="ajout_promo.php" method="POST">
                            <div class="mb-1">
                                <label  class="form-label"><h5>taux de redecction</h5></label>
                                <input type="text" class="form-control" name="taux">                
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label"><h5>date debut  </h5></label>
                                <input type="date" class="form-control"  name="date_debut">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>date fin</h5></label>
                                <input type="date" class="form-control"  name="date_fin">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>produit</h5></label>
                                <select name="produit" id="" class="form-control">
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