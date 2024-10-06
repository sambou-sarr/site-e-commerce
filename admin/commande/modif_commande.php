<?php 
        require_once("../../connection.php");
        $id = $_GET['id'];
       $sql="SELECT * FROM user";
       $users= $db->query($sql)->fetchAll();
       if(isset($_POST['user'])){
        $user = $_POST['user'];
        $sql1 = "UPDATE commande SET id_utilisateur = ? WHERE commande.id_cmd = ?";
        $stmt = $db->prepare($sql1);
        $stmt->execute([$user,$id]);
        header('Location: liste_commande.php');
       }
       require_once('../layout/header.php');
?>
<form action="" method="POST" class="w-70"> 
    <div class="form-group">
        <label ><h4>user </h4></label>
        <select name="user" id="" class="form-control">
            <?php foreach ($users as $user) : ?>
                <option value="<?= $user['id_user']?>"> <?php echo "( ".$user['id_user']." )   ".$user['nom_user']." ".$user['prenom_user'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <br/>
    <div class="mb-1">
        <button type="submit" class="btn btn-success">valider</button>
    </div>  
</form>