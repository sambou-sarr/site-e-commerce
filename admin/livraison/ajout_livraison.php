<?php
require_once("traitement_livraison.php");
$sql="SELECT * FROM commande";
$commandes= $db->query($sql)->fetchAll();

$sql="SELECT * FROM livreur";
$livreurs= $db->query($sql)->fetchAll();
require_once('../layout/header.php');

?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> Ajout  livraison </i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="ajout_livraison.php" method="POST">
                            <div class="mb-1">
                                <label  class="form-label"><h5 >commande </h5></label>
                                <select name="commande" id="" class="form-control">
                                    <?php foreach ($commandes as $commande) :?>
                                        <option value="<?= $commande['id_cmd']?>">commande numero : <strong><?= $commande['id_cmd']?></strong></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>date de livraison</h5></label>
                                <input type="date" class="form-control" name="date">                
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label"><h5>livreur </h5></label>
                                <select name="livreur" id="" class="form-control">
                                    <?php foreach ($livreurs as $livreur) :?>
                                        <option value="<?= $livreur['id_livreur']?>"><?php echo "( ".$livreur['id_livreur']." ) ".$livreur['prenom_livreur']." ".$livreur['nom_livreur']?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>Adresse</h5></label>
                                <input type="text" class="form-control"  name="adresse">
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