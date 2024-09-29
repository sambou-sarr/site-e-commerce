<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $sql="SELECT * FROM produit";
        $produits= $db->query($sql)->fetchAll();
        $sql="SELECT * FROM user";
        $users= $db->query($sql)->fetchAll();
       
        if (!empty($_POST)) {
            $id = $_POST['produit'];
            $sql = "SELECT * FROM produit WHERE id_prod = ?";
            $prepare = $db->prepare($sql);
            $prepare->execute([$id]);
            $produit = $prepare->fetch(PDO::FETCH_ASSOC);
        
            $id_prod = $id;
            $libelle = $produit['lib_prod'];
            $id_user = $_POST['user'];
            $prix_u = $produit['prix_prod'];
            $quantite = $_POST['quantite'];
            $prix = $quantite * $prix_u;
        
            if (!isset($_SESSION['tab'])) {
                $_SESSION['tab'] = [
                    'id_produit' => [],
                    'libelle produit' => [],
                    'id_user' => [],
                    'prix_unitaire' => [],
                    'quantite' => [],
                    'prix' => []
                ];
            }
        
            array_push($_SESSION['tab']['id_produit'], $id_prod);
            array_push($_SESSION['tab']['libelle produit'], $libelle);
            array_push($_SESSION['tab']['id_user'], $id_user);
            array_push($_SESSION['tab']['prix_unitaire'], $prix_u);
            array_push($_SESSION['tab']['quantite'], $quantite);
            array_push($_SESSION['tab']['prix'], $prix);
        }
?>
                <h2>Liste des commandes</h2>
                      
    <div class="row  top-100 ">

    
        <div class="col-md-5">
                <h1 class="display-3"> <i class="bi bi-plus-circle"> Ajout  commande </i></h1>
              <form action="ajout_commande.php" method="POST" class="w-70"> 
                    <div class="form-group">
                        <label ><h4>Produit </h4></label>
                        <select name="produit" id="" class="form-control">
                            <?php foreach ($produits as $produit) : ?>
                            <option value="<?= $produit['id_prod']?>"> <?= $produit['lib_prod']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label ><h4>Quantite</h4></label>
                        <input class="form-control" type="text" name="quantite" id="quantite" />
                    </div>
                    <div class="form-group">
                     <label ><h4>user </h4></label>
                        <select name="user" id="" class="form-control">
                             <?php foreach ($users as $user) : ?>
                                <option value="<?= $user['id_user']?>"> <?php echo "( ".$user['id_user']." )   ".$user['nom_user']." ".$user['prenom_user'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br/>
                    <div>
                    <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-plus-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                                ajouter au panier
                            </i>
                        </button>
                        
                        <button class="btn btn-light"  type="reset">Annuler</button>
                      
                    </div>
               </form>
               <br/>
               <br/>
                    <input type="hidden" name="terminer" id="terminer" value="true" >
                    <a href="traitement_commande.php" class="btn btn-success"> <i class="bi bi-plus-circle">terminer</i></a>
                 <a href="vider_panier.php" class="btn btn-danger">vider le panier</a>               
               
             </div>
        <div class="col-md-7">
            
               <i class="bi bi-plus-circle"><h1 class="display-6"> verifier votre panier</h1></i>
          
            <br>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     votre panier<span class="badge bg-primary rounded-pill">  <?php if(isset($_SESSION['tab']['id_produit'])){echo count($_SESSION['tab']['id_produit']); }else{ echo "0";}  ?></span>
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">id produit</th>
                                <th scope="col">id user</th>
                                <th scope="col">libelle produit </th>
                                <th scope="col">prix unitaire</th>
                                <th scope="col">quantite </th>
                                <th scope="col">prix</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php for ($i=0; $i <count($_SESSION['tab']['id_produit']) ; $i++) :?>
                              <tr>                            
                              <th scope="row"><?= $_SESSION['tab']['id_produit'][$i]?></th>
                              <th scope="row"><?= $_SESSION['tab']['id_user'][$i]?></th>
                                  <td><?= $_SESSION['tab']['libelle produit'][$i] ?></td>
                                  <td><?= $_SESSION['tab']['prix_unitaire'][$i] ?></td>                          
                                  <td><?= $_SESSION['tab']['quantite'][$i] ?> Kg</td>
                                  <td><?= $_SESSION['tab']['prix'][$i] ?> F</td>
                                   <td> <a href=""><img src="../produit/images/retirer-le-panier.png" style="width: 30px; height: 30px;"></a></td>
                                </tr> 
                            <?php endfor ?>
                            </tbody>
                          </table>     
                    </div>
                  </div>
                </div>
            
       
            <div class="col4">
                
            </div>
        </div>
 
        </div>
        <div class="row ">
          <div class="col-md-2">

          </div>
          <div class="col-md-10">
          </div>
        </div>
       
         
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
