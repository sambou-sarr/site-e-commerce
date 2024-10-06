<?php
require_once("../../connection.php");
$sql = "SELECT * FROM user";
$users = $db->query($sql)->fetchAll();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id_user = ?";
    try {
        $prepare = $db->prepare($sql);
        $prepare->execute([$id]);
        header('Location: liste_user.php'); 
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
    <title>Liste des Utilisateurs</title>
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
    <h1>Liste des Utilisateurs</h1>
    <p class="lead">Voici la liste des utilisateurs enregistrés.</p>
</div><br>

<div class="mb-3 text-center">
    <a class="btn btn-success btn-lg" href="ajout_user.php">
        <i class="fas fa-plus-circle"></i> Ajouter un utilisateur
    </a>
</div>

<div>
<input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Rechercher un user...">
</div>
<div class="table-responsive">
    <table id="myTable" class="table table-hover table-striped table-bordered shadow-lg;">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Login</th>
            <th scope="col">Mot de Passe</th>
            <th scope="col">Adresse</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <th scope="row"><?php echo $user['id_user']; ?></th>
                <td><?php echo $user['prenom_user']; ?></td>
                <td><?php echo $user['nom_user']; ?></td>
                <td><?php echo $user['email_user']; ?></td>
                <td><?php echo $user['tel_user']; ?></td>
                <td><?php echo $user['login_user']; ?></td>
                <td><?php echo $user['password_user']; ?></td>
                <td><?php echo $user['adresse_user']; ?></td>
                <td>
                    <a class="btn btn-primary" href="modif_user.php?id=<?php echo $user['id_user']; ?>">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <a class="btn btn-danger" href="liste_user.php?id=<?php echo $user['id_user']; ?>">
                        <i class="fas fa-trash-alt"></i> Supprimer
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
