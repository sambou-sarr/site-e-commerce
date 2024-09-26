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
                            <a class="nav-link text-white" href="admin/admin/liste_admin.php">
                                <i class="fas fa-user-shield"></i>
                                Admin
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="admin/categorie/liste_categorie.php">
                                <i class="fas fa-tags"></i>
                                Catégorie
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="admin/commande/liste_commande.php">
                                <i class="fas fa-shopping-cart"></i>
                                Commandes
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="admin/livraison/liste_livraison.php">
                                <i class="fas fa-shipping-fast"></i>
                                Livraisons
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="admin/livreur/liste_livreur.php">
                                <i class="fas fa-truck"></i>
                                Livreurs
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="admin/produit/liste_produit.php">
                                <i class="fas fa-box-open"></i>
                                Produits
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="admin/promotion/liste_promo.php">
                                <i class="fas fa-percent"></i>
                                Promotions
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-white" href="admin/user/liste_user.php">
                                <i class="fas fa-users"></i>
                                Utilisateurs
                            </a>
                        </li>
                </div>
            </nav>

            <!-- Contenu principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tableau de Bord</h1>
                </div>

                <!-- Statistiques sous forme de cartes -->
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
                                <p class="card-text">Suivi des livraisons et gestion des livreurs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Utilisateurs</h5>
                                <p class="card-text">Gestion des utilisateurs et de leurs rôles.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Liste des Utilisateurs -->
                <h2>Liste des Utilisateurs</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Connexion à la base de données
                            $servername = "127.0.0.1"; // Adresse du serveur
                            $username = "root"; // Nom d'utilisateur MySQL
                            $password = ""; // Mot de passe de l'utilisateur MySQL
                            $dbname = "db_commerce"; // Nom de la base de données

                            // Création de la connexion
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Vérifier la connexion
                            if ($conn->connect_error) {
                                die("Connexion échouée : " . $conn->connect_error);
                            }

                            // Requête SQL pour récupérer les utilisateurs
                            $sql = "SELECT * FROM user";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>" . htmlspecialchars($row["id_user"]) . "</td>
                                            <td>" . htmlspecialchars($row["nom_user"]) . "</td>
                                            <td>" . htmlspecialchars($row["prenom_user"]) . "</td>
                                            <td>" . htmlspecialchars($row["email_user"]) . "</td>
                                            <td>" . htmlspecialchars($row["tel_user"]) . "</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>Aucun utilisateur trouvé</td></tr>";
                            }

                            // Fermeture de la connexion
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
