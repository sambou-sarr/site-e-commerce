<?php
require_once("traitement_categorie.php");
require_once('../layout/header.php');
?>
    <div class="header">
         <h1>Ajout  catégories</h1>
        <p class="lead"></p>
    </div><br></br>
    <form action="ajout_categorie.php" method="POST">
        <label for="name">libelle</label>
        <input type="text" id="name" name="libelle" placeholder="Entrer le libelle" required>
        <br><br>
        <button type="submit">valider</button>
    </form>

</body>
</html>