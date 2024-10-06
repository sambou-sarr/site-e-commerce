modifier_profil.php

<?php
// Connexion à la base de données
require_once("../../connection.php");

// Récupération de l'ID de l'admin via l'URL
$id_admin = $_GET['id'] ?? 1;

// Récupération des informations actuelles de l'admin
$sql = "SELECT * FROM admin WHERE id_admin = ?";
$prepare = $db->prepare($sql);
$prepare->execute([$id_admin]);
$admin = $prepare->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
    echo "Aucun administrateur trouvé.";
    exit;
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    // Traitement de l'image
    $image_name = $admin['image']; // Image actuelle par défaut
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = '../produit/images/'; // Chemin où stocker les images
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];

        // Déplacement de l'image téléchargée
        move_uploaded_file($image_tmp_name, $upload_dir . $image_name);
    }

    // Mise à jour des informations de l'administrateur dans la base de données
    $sql = "UPDATE admin SET nom_admin = ?, prenom_admin = ?, email_admin = ?, tel_admin = ?, image = ? WHERE id_admin = ?";
    $prepare = $db->prepare($sql);
    $prepare->execute([$nom, $prenom, $email, $tel, $image_name, $id_admin]);

    header("Location: profil.php?id=$id_admin");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier le profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4">Modifier les informations du profil</h3>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($admin['nom_admin']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($admin['prenom_admin']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($admin['email_admin']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="tel" name="tel" value="<?= htmlspecialchars($admin['tel_admin']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Changer la photo de profil</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="form-text text-muted">Laissez vide pour conserver l'image actuelle.</small>
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-save"></i> Enregistrer
                </button>
                <a href="profil.php?id=<?= $admin['id_admin'] ?>" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>