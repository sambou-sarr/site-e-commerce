<?php require_once("../../connection.php");
require_once('../layout/header.php');
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
</head>
<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header text-center">
                <h2>Mon Profil</h2>
            </div>
            <div class="card-body text-center">
                <img src="../produit/images/tof.jpg" class="rounded-circle mb-3" alt="Photo de profil" style="width: 150px; height: 150px; object-fit: cover;">
                
                <form>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" required value="<?php echo $admin['nom_admin']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" value="<?php echo $admin['prenom_admin']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Entrez votre email" value="<?php echo $admin['email_admin']; ?>"required>
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" placeholder="Entrez votre login" value="<?php echo $admin['login_admin']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" value="<?php echo $admin['password_admin']; ?>"required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
