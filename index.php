<?php  
        require_once("connection.php");
        $sql="SELECT * FROM admin";
        $admins= $db->query($sql)->fetchAll();
       
        if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['role'])){
            foreach ($admins as $admin) {
                if (($admin['login_admin'] == $_POST['login']) && ($admin['password_admin'] == $_POST['password']) && $admin['statut_admin'] ==$_POST['role']) {
                    session_start();
                    $_SESSION['connecter']= 1;
                    if($admin['statut_admin'] == 'admin'){
                        $_SESSION['id'] = $admin['id_admin'];
                        $_SESSION['nom'] = $admin['nom_admin'];
                        $_SESSION['prenom'] = $admin['prenom_admin'];
                        $_SESSION['login'] = $admin['login_admin'];
                        $_SESSION['image'] = $admin['image'];
                        $_SESSION['email'] = $admin['email_admin'];
                        $_SESSION['status'] = $admin['statut_admin'];
                         header('Location: admin.php');
                    }elseif($admin['statut_admin'] == 'super'){
                        $_SESSION['id'] = $admin['id_admin'];
                        $_SESSION['nom'] = $admin['nom_admin'];
                        $_SESSION['prenom'] = $admin['prenom_admin'];
                        $_SESSION['login'] = $admin['login_admin'];
                        $_SESSION['image'] = $admin['image'];
                        $_SESSION['email'] = $admin['email_admin'];
                        $_SESSION['status'] = $admin['statut_admin'];
                         header('Location: super_admin.php');
                    }
                    exit();
                }
            }
        }
        require_once("admin/auth/authentification.php");
        if(est_connecter()){
            if($_SESSION['status']  == 'admin'){
                header('Location: admin.php');
                exit();
            }elseif($_SESSION['status']  == 'super'){
                header('Location: super_admin.php');
                exit();  
            }
         
        }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Connexion</h2>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Entrez votre login" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Statut</label>
                    <select class="form-select" id="role" name="role">
                        <option value="admin" selected>Admin</option>
                        <option value="super">Super</option>
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
 
    

