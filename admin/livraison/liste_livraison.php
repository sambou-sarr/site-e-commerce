<?php   
require_once("../../connection.php");
$sql = "SELECT * FROM livraison";
$livraisons = $db->query($sql)->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM livraison WHERE id_livraison = ?";
    try {
        $prepare = $db->prepare($sql);
        $prepare->execute([$id]);
        header('Location: liste_livraison.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
    }
}
require_once("../layout/header.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livraisons</title>
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
    <h1>Liste des livraisons</h1>
    <p class="lead">Voici la liste des livraisons en cours.</p>
</div><br>

<div class="mb-3 text-center">
    <a class="btn btn-success btn-lg" href="ajout_livraison.php">
        <i class="fas fa-plus-circle"></i> Ajouter une livraison
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered shadow-lg;">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ID Commande</th>
            <th scope="col">Date Livraison</th>
            <th scope="col">ID Livreur</th>
            <th scope="col">Adresse</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($livraisons as $livraison) : ?>
            <tr>
                <th scope="row"><?php echo $livraison['id_livraison']; ?></th>
                <td><?php echo $livraison['id_commande']; ?></td>
                <td><?php echo $livraison['date_livraison']; ?></td>
                <td><?php echo $livraison['id_livreur']; ?></td>
                <td><?php echo $livraison['adresse_livraison']; ?></td>
                <td>
                    <a class="btn btn-primary" href="modif_livraison.php?id=<?php echo $livraison['id_livraison']; ?>">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <a class="btn btn-danger" href="liste_livraison.php?id=<?php echo $livraison['id_livraison']; ?>">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once("../layout/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
