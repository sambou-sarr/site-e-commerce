<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-tachometer-alt"></i>
                                Tableau de Bord 
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="../categorie/liste_categorie.php">
                                <i class="fas fa-tags"></i>
                                Catégorie
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="../commande/liste_commande.php">
                                <i class="fas fa-shopping-cart"></i>
                                Commandes
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="../livraison/liste_livraison.php">
                                <i class="fas fa-shipping-fast"></i>
                                Livraisons
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="../livreur/liste_livreur.php">
                                <i class="fas fa-truck"></i>
                                Livreurs
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="../produit/liste_produit.php">
                                <i class="fas fa-box-open"></i>
                                Produits
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="liste_promo.php">
                                <i class="fas fa-percent"></i>
                                Promotions
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="../user/liste_user.php">
                                <i class="fas fa-users"></i>
                                Utilisateurs
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                        <?php if(est_connecter()): ?>
                        <a href="admin/auth/deconnection.php" class="nav-link text-danger">
                         <i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                         <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tableau de Bord</h1>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Commandes</h5>
                                <p class="card-text">Gestion des commandes en attente, traitées et expédiées.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Produits</h5>
                                <p class="card-text">Ajouter, modifier ou supprimer des produits.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Livraisons</h5>
                                <p class="card-text">Suivi des livraisons.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-dark mb-3"> <!-- Changement de couleur ici -->
                            <div class="card-body">
                                <h5 class="card-title">Promotions</h5>
                                <p class="card-text">Gérer les promotions.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Liste des promotions</h2>
                <?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $sql="SELECT * FROM promotion";
        $promotions= $db->query($sql)->fetchAll();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) ) {
                $id = $_GET['id'];
            
                $sql = "DELETE FROM promotion WHERE id_promo = ?";
            
                try {
                    $prepare = $db->prepare($sql);
                    $prepare->execute([$id]);
                    header('Location: liste_promo.php');                    
                } catch (PDOException $e) {
                    echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
                }
            } 

        }
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">taux</th>
      <th scope="col">date debut</th>
      <th scope="col">date fin</th>
      <th scope="col">produit</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($promotions as $promotion) :?>
        <tr>
        <th scope="row" style="color: black;"><?php echo $promotion['id_promo'] ;?></th>
        <td><?php echo $promotion['taux_promo'] ;?></td>
        <td><?php echo $promotion['date_debut'] ;?></td>
        <td><?php echo $promotion['date_fin'] ;?></td>
        <td><?php echo $promotion['id_produit'] ;?></td>
        <td>
           <a class="btn btn-primary" href="modif_promo.php?id=<?php echo $promotion['id_promo']; ?>">modifier </a>
           <a class="btn btn-danger" href="liste_promo.php?id=<?php echo$promotion['id_promo']; ?>">supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
<?php   require_once("../layout/footer.php");?>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
