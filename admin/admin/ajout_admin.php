<?php require_once('../layout/header.php');
require_once("traitement_admin.php");
?>
    <h1 class="display-3"> <i class="bi bi-plus-circle"> Ajout  admin</i></h1>
    <div class="row">
        <div class="col-md-4"> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="d1">
                        <form action="ajout_admin.php" method="POST">
                            <div class="mb-1">
                                <label  class="form-label"><h5 >Prenom</h5></label>
                                <input type="text" class="form-control"  name="prenom" >
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>Nom</h5></label>
                                <input type="text" class="form-control" id="nom" name="nom">                
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label"><h5>Email </h5></label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>telephone</h5></label>
                                <input type="number" class="form-control"  name="tel">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>login</h5></label>
                                <input type="text" class="form-control"  name="login">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>password</h5></label>
                                <input type="password" class="form-control"  name="password">
                            </div>
                            <div class="mb-1">
                                <label  class="form-label"><h5>statut</h5></label>
                                <select name="statut" id="" class="form-control">
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