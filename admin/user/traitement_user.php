<?php
require_once("../../connection.php");
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel'])  && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['login']) && isset($_POST['password'])){
        $nom = $_POST['nom'];
        $prenom =$_POST ['prenom'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $login = $_POST['login'];
        $password = $_POST['password'];

        try {
            $sql= "INSERT INTO user  (id_user ,nom_user ,prenom_user ,email_user ,tel_user ,login_user ,password_user ,adresse_user) VALUES (null,? ,? ,? ,? ,? ,? ,?)";
            $prepare = $db->prepare($sql);
            $prepare->execute([$nom, $prenom, $email, $tel,$login, $password, $adresse ]);
            header('Location: liste_user.php');
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
        }
}


?>