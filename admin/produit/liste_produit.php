<?php
require_once("../../connection.php");
$sql = "SELECT * FROM produit";
$produits = $db->query($sql)->fetchAll();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM produit WHERE id_prod = ?";
    try {
        $prepare = $db->prepare($sql);
        $prepare->execute([$id]);
        header('Location: liste_produit.php'); // Redirection après suppression
        exit(); // Sortir après la redirection pour éviter d'exécuter le reste du code
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
    }
}require_once("../layout/header.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
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
    <h1>Liste des Produits</h1>
    <p class="lead">Voici la liste des produits disponibles dans notre catalogue.</p>
</div><br>

<div class="mb-3 text-center">
    <a class="btn btn-success btn-lg" href="ajout_produit.php">
        <i class="fas fa-plus-circle"></i> Ajouter un produit
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered shadow-lg;">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ID Catégorie</th>
            <th scope="col">Libellé</th>
            <th scope="col">Quantité en Stock</th>
            <th scope="col">Prix</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($produits as $produit) : ?>
            <tr>
                <th scope="row"><?php echo $produit['id_prod']; ?></th>
                <td><?php echo $produit['id_categorie']; ?></td>
                <td><?php echo $produit['lib_prod']; ?></td>
                <td><?php echo $produit['qte_en_stock']; ?></td>
                <td><?php echo $produit['prix_prod']; ?></td>
                <td><img src="images/<?php echo $produit['img_prod']; ?>" alt="image produit" style="width: 100px; height: auto;"></td>
                <td>
                    <a class="btn btn-primary" href="modif_produit.php?id=<?php echo $produit['id_prod']; ?>">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <a class="btn btn-danger" href="liste_produit.php?id=<?php echo $produit['id_prod']; ?>">
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
