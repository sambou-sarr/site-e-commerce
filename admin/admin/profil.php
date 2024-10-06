<?php 
require_once("../../connection.php");
$id = $_GET['id'];

$sql = "SELECT * FROM admin WHERE id_admin = ?";
$prepare = $db->prepare($sql);
$prepare->execute([$id]);
$admin = $prepare->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body { background-color: #f0f2f5; }
        .profile-card {
            max-width: 600px; margin: 50px auto; background-color: white;
            border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px;
            transition: transform 0.3s ease-in-out;
        }
        .profile-card:hover { transform: scale(1.02); }
        .profile-card h2 { color: #333; font-weight: bold; }
        .profile-card p { font-size: 1.1em; color: #555; }
        .profile-card .fa { color: #007bff; margin-right: 10px; }
        .btn-edit { background-color: #007bff; color: white; margin-top: 10px; }
        .btn-edit:hover { background-color: #0056b3; }
        .btn-primary, .btn-secondary { margin-right: 10px; }
        #editForm { display: none; opacity: 0; transition: opacity 0.5s ease-in-out; }
        #editForm.show { display: block; opacity: 1; }
        .form-control { border-radius: 10px; padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="profile-card">
            <div class="card-body">
                <h2 class="card-title">Mon Profil</h2>
                <img src="../produit/images/<?php echo htmlspecialchars($admin['image']); ?>" class="rounded-circle mb-3" alt="Photo de profil" style="width: 150px; height: 150px; object-fit: cover;">
                
                <div id="profileDisplay">
                    <p><i class="fa fa-user"></i> <strong>Nom :</strong> <span id="displayNom"><?php echo htmlspecialchars($admin['nom_admin']); ?></span></p>
                    <p><i class="fa fa-user"></i> <strong>Prénom :</strong> <span id="displayPrenom"><?php echo htmlspecialchars($admin['prenom_admin']); ?></span></p>
                    <p><i class="fa fa-envelope"></i> <strong>Email :</strong> <span id="displayEmail"><?php echo htmlspecialchars($admin['email_admin']);?></span></p>
                    <p><i class="fa fa-phone"></i> <strong>Téléphone :</strong> <span id="displayPhone"><?php echo htmlspecialchars($admin['tel_admin']);?></span></p>
                    
                    <button class="btn btn-edit" onclick="toggleEditForm()">Modifier</button>
                </div>
                
                <div id="editForm">
                    <form action="modifier_profil.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($admin['nom_admin']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($admin['prenom_admin']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($admin['email_admin']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo htmlspecialchars($admin['tel_admin']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Changer la photo de profil</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <small class="form-text text-muted">Laissez vide pour conserver l'image actuelle.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        <button type="button" class="btn btn-secondary" onclick="toggleEditForm()">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleEditForm() {
            var form = document.getElementById("editForm");
            form.classList.toggle("show");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
