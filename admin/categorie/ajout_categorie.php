<?php
require_once("traitement_categorie.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>form {
        max-width: 500px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    
    input, select, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    
    button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    button:hover {
        background-color: #218838;
    }
    </style>
</head>
<body>
    <form action="ajout_categorie.php" method="POST">
        <label for="name">libelle</label>
        <input type="text" id="name" name="libelle" placeholder="Entrer le libelle" required>
        <br><br>
        <button type="submit">valider</button>
    </form>

</body>
</html>