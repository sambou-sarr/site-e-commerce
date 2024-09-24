<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $id = $_GET['id'];
        $sql="SELECT * FROM categorie WHERE id_cat = ?";
        $prepare = $db->prepare($sql)->execute($id);

        $categorie= $db->query($sql)->fetchAll();
?>
<body>
    <form action="ajout_categorie.php" method="POST">
        <label for="name">libelle</label>
        <input type="text" id="name" name="libelle" placeholder="Entrer le libelle" value="<?php echo $categorie['lib_cat'] ;?>">
        <br><br>
        <button type="submit">valider</button>
    </form>
<?php require_once("../layout/footer.php"); ?>