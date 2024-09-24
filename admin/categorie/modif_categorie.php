<?php   require_once("../layout/header.php");
        require_once("../../connection.php");
        $id = $_GET['id'];
        $sql="SELECT * FROM categorie WHERE id_cat = ?";
        $prepare = $db->prepare($sql);
        $prepare ->execute([$id]);
        $categorie= $prepare->fetch(PDO::FETCH_ASSOC);;
        var_dump($categorie);
        if (isset($_POST['libelle'])) {
            $libelle = $_POST['libelle'];
           
        
            $sql = "UPDATE categorie SET lib_cat =  ? WHERE id_cat = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$libelle, $id]);
        
            echo "Propriétaire mis à jour avec succès.";
        }
?>
<body>
    <form action="modif_categorie.php" method="POST">
        <label for="name">libelle</label>
        <input type="hidden" name="id" value="<?php echo $categorie['id_cat'] ;?>">
        <input type="text" id="name" name="libelle" placeholder="Entrer le libelle" value="<?php echo $categorie['lib_cat'] ;?>">
        <br><br>
        <button type="submit">valider</button>
    </form>
<?php require_once("../layout/footer.php"); ?>