<?php  
    require_once("../layout/header.php");
    require_once("../../connection.php");

    $id = $_GET['id'];

    $sql = "SELECT * FROM categorie WHERE id_cat = ?";
    $prepare = $db->prepare($sql);
    $prepare->execute([$id]);
    $categorie = $prepare->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['libelle'])) {
        $libelle = $_POST['libelle'];
        
        $sql = "UPDATE categorie SET lib_cat =  ? WHERE id_cat = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$libelle, $id]);
        
        header("Location: liste_categorie.php");
        exit();
    }
?>

<body>
    <form action="" method="POST">
        <label for="name">Libellé</label>
        <input type="hidden" name="id" value="<?php echo $categorie['id_cat']; ?>">
        <input type="text" id="name" name="libelle" placeholder="Entrer le libellé" value="<?php echo $categorie['lib_cat']; ?>" required>
        <br><br>
        <button type="submit">Valider</button>
    </form>
<?php require_once("../layout/footer.php"); ?>
