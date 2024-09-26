<?php
require_once('../layout/header.php');
require_once("traitement_produit.php");
?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> Ajout  produit </i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="ajout_produit.php" method="POST">
                            <div class="mb-1">
                                <label  class="form-label"><h5 >libelle</h5></label>
                                <input type="text" class="form-control"  name="libelle" >
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>Quantite en stock</h5></label>
                                <input type="text" class="form-control" name="qute">                
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label"><h5>Prix </h5></label>
                                <input type="number" class="form-control"  name="prix">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>image</h5></label>
                                <input type="file" class="form-control"  name="img">
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