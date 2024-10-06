<?php 
require_once('../auth/authentification.php');
if(!est_connecter()){
    header('location:../../index.php');
    exit();
}
$nom =  $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$email = $_SESSION['email'];
$id = $_SESSION['id'];
$image = $_SESSION['image'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>

form {
        max-width: 500px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    
    input, select, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    
    button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    button:hover {
        background-color: #218838;
    }



        h1{
            text-align: center;
            top: 300px;
        }
        h2{
            text-align: center;

        }
    
        .d1 {
         text-align: center; 
        background-color: whitesmoke; 
        color: #333; 
        padding: 10px; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
        font-size: 30px; 
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        th{
            background-color: #333;
            color: whitesmoke;
            border: 2px solid #fff;
            padding: 10px;
        }
        .sidebar .nav-link:hover {
            background-color: #495057; /* Couleur des liens au survol */
        }
        .content {
            padding: 20px; /* Espacement du contenu */
        }
    </style>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user" style="font-size: 2rem; margin-right: 10px;"></i> <!-- Icône de profil -->
                        Mon compte 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li class="dropdown-item text-center"><img src="../produit/images/<?=$image ?>" class="img-fluid rounded-circle w-25" alt=""></li>  
                                    <li class="dropdown-item "><strong><?= $email ?></strong></li>
                                    <li><a class="dropdown-item" href="../admin/profil.php?id=<?= $id?>">Mes informations</a></li>
                                    <li><a class="dropdown-item" href="ges_compte.php">Gérer mon compte</a></li>
                                    <li class="nav-item mb-3">
                                        <?php if(est_connecter()): ?>
                                        <a href="../auth/deconnection.php" class="nav-link text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                    </div>
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
                            <a class="nav-link text-white" href="../promotion/liste_promo.php">
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
                            <a class="nav-link text-white" href="../notification/liste_notification.php">
                              <i class="fas fa-bell"></i> <!-- Icône de notification -->
                               Notifications
                           </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
            <div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tableau de Bord</h1>
            <h1 class="h2"><?php echo $prenom . " " . $nom; ?></h1>
        </div>
    </div>
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
<?php ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>