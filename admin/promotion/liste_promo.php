<?php
require_once("../layout/header.php");
require_once("../../connection.php");

// Récupération des promotions
$sql = "SELECT * FROM promotion";
$promotions = $db->query($sql)->fetchAll();

// Suppression d'une promotion si un ID est passé en paramètre
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM promotion WHERE id_promo = ?";
    
    try {
        $prepare = $db->prepare($sql);
        $prepare->execute([$id]);
        header('Location: liste_promo.php'); // Redirection après suppression
        exit(); // Sortir après redirection pour éviter l'exécution du reste du code
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Promotions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #f4f7fa;
        }

        .header {
            background: linear-gradient(90deg, #4b79a1, #283e51);
            color: white;
            padding: 30px 0;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
        }

        .table {
            transition: transform 0.3s ease;
        }

        .table:hover {
            transform: scale(1.01);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .btn-success {
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.3);
        }

        .btn-primary {
            box-shadow: 0 4px 10px rgba(0, 0, 255, 0.3);
        }

        .btn-danger {
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.3);
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Liste des Promotions</h1>
    <p class="lead">Voici la liste des promotions disponibles.</p>
</div><br>

<div class="mb-3 text-center">
    <a class="btn btn-success btn-lg" href="ajout_promo.php">
        <i class="fas fa-plus-circle"></i> Ajouter une promotion
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered shadow-lg;">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Taux (%)</th>
            <th scope="col">Date Début</th>
            <th scope="col">Date Fin</th>
            <th scope="col">Produit</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($promotions as $promotion) : ?>
            <tr>
                <th scope="row"><?php echo $promotion['id_promo']; ?></th>
                <td><?php echo $promotion['taux_promo']; ?></td>
                <td><?php echo $promotion['date_debut']; ?></td>
                <td><?php echo $promotion['date_fin']; ?></td>
                <td><?php echo $promotion['id_produit']; ?></td>
                <td>
                    <a class="btn btn-primary" href="modif_promo.php?id=<?php echo $promotion['id_promo']; ?>">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <a class="btn btn-danger" href="liste_promo.php?id=<?php echo $promotion['id_promo']; ?>">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once("../layout/footer.php"); ?>
</body>
</html>
