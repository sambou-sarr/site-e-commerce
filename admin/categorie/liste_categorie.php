<?php   
        require_once("../../connection.php");
        $sql="SELECT * FROM categorie";
        $categories= $db->query($sql)->fetchAll();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) ) {
                $id = $_GET['id'];
            
                // Requête de suppression avec un placeholder
                $sql = "DELETE FROM categorie WHERE id_cat = ?";
            
                try {
                    // Préparation de la requête
                    $prepare = $db->prepare($sql);
            
                    // Exécution de la requête avec le paramètre
                    $prepare->execute([$id]);
            
                    header('location: liste_categorie.php');
                } catch (PDOException $e) {
                    echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
                }
            } 

        }
        require_once("../layout/header.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
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
<h1>Liste des catégories</h1>
<p class="lead">Voici la liste des catégories disponibles dans notre catalogue</p>
</div><br></br>

<div class="mb-3 text-center">
    <a class="btn btn-success btn-lg" href="ajout_categorie.php">
      <i class="fas fa-plus-circle">Ajouter une catégorie</i>
    </a>
</div>
<div>
<input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Rechercher une catégorie...">
</div>
<div class="table-responsive">
<table id="myTable" class="table table-hover table-striped table-bordered shadow-lg;">
  <thead class="table-dark">
    <tr>
      <th scope="col">id</th> 
      <th scope="col">libelle</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($categories as $categorie) :?>
        <tr>
        <th scope="row"><?php echo $categorie['id_cat'] ;?></th>
        <td><?php echo $categorie['lib_cat'] ;?></td>
        <td>
           <a class="btn btn-primary" href="modif_categorie.php?id=<?php echo $categorie['id_cat']; ?>">
            <i class="fas fa-edit"></i>modifier 
          
           </a>
           <a class="btn btn-danger" href="liste_categorie.php?id=<?php echo$categorie['id_cat']; ?>">
            <i class="fas fa-trash-alt"></i>supprimer  </a>
        </td>
        </tr>
      <?php endforeach ;?>
  </tbody>
</table>
</div>
<?php   require_once("../layout/footer.php");?>
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

