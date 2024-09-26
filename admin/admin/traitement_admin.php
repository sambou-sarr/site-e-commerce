<?php
require_once("../../connection.php");
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel'])  && isset($_POST['email']) && isset($_POST['statut']) && isset($_POST['login']) && isset($_POST['password'])){
        $nom = $_POST['nom'];
        $prenom =$_POST ['prenom'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $statut = $_POST['statut'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        try {
            $sql= "INSERT INTO admin  (id_admin ,nom_admin ,prenom_admin ,email_admin ,tel_admin ,login_admin ,password_admin ,statut_admin) VALUES (null,? ,? ,? ,? ,? ,? ,?)";
            $prepare = $db->prepare($sql);
            $prepare->execute([$nom, $prenom, $email, $tel,$login, $password, $statut]);
            header('Location: liste_admin.php');
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
        }
}


?>