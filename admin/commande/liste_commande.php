<?php
require_once("../layout/header.php");
require_once("../../connection.php");

$sql = "SELECT * FROM commande";
$commandes = $db->query($sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes</title>
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
    <h1>Liste des commandes</h1>
    <p class="lead">Voici la liste des commandes effectuées.</p>
</div><br>

<div class="mb-3 text-center">
    <a class="btn btn-success btn-lg" href="ajout_commande.php">
        <i class="fas fa-plus-circle"></i> Ajouter une commande
    </a>
</div>
<div>
<input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Rechercher une commande...">
</div>
<div class="table-responsive">
<table id="myTable" class="table table-hover table-striped table-bordered shadow-lg;">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ID Utilisateur</th>
            <th scope="col">État de la commande</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($commandes as $commande) : ?>
            <tr>
                <th scope="row"><?php echo $commande['id_cmd']; ?></th>
                <td><?php echo $commande['id_utilisateur']; ?></td>
                <td><?php echo $commande['etat_cmd']; ?></td>
                <td>
                    <a class="btn btn-primary" href="modif_commande.php?id=<?php echo $commande['id_cmd']; ?>">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <a class="btn btn-danger" href="liste_commande.php?id=<?php echo $commande['id_cmd']; ?>">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </a>
                    <a class="btn btn-light" href="voir_commande.php?id=<?php echo $commande['id_cmd']; ?>">
                        <i class="fas fa-eye"></i> Voir plus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once("../layout/footer.php"); ?>
<script>
        function filterTable() {
            var input = document.getElementById("searchInput");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("myTable");
            var tr = table.getElementsByTagName("tr");

            for (var i = 1; i < tr.length; i++) {
                var tdArray = tr[i].getElementsByTagName("td");
                var isMatch = false;

                for (var j = 0; j < tdArray.length; j++) {
                    var td = tdArray[j];
                    if (td) {
                        if (td.textContent.toUpperCase().indexOf(filter) > -1) {
                            isMatch = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = isMatch ? "" : "none";
            }
        }
    </script>
</body>
</html>
