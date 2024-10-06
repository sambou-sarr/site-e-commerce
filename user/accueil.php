<?php require_once('../connection.php');
$sql ="SELECT * FROM produit";
$produits = $db->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>accueil </title>
    <style>
        body{
            background: linear-gradient(to right, rgb(46, 45, 45), rgb(100, 100, 100));
            color: white;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand display-4" href="#"><i>sama boutik</i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<section class="py-5" id="services">
        <div class="container">
            <h2 class="text-center mb-5 display-3"><i>Nos produits</i></h2>
            <div class="row g-4">
                <?php foreach ($produits as $produit) :?>
                    <div class="col-md-4">
                        <div class="card service-card p-3 text-center">
                            <img src="../admin/produit/images/<?= $produit['img_prod']?>" class="card-img-top" >
                            <div class="card-body">
                                <h5 class="card-title"><?= $produit['lib_prod']?></h5>
                                <p class="card-text">prix : <?= $produit['prix_prod']?></p>
                                <a href="#" class="btn btn-outline-primary">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    
</body>
</html>