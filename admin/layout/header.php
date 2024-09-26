<?php require_once('../auth/authentification.php');
if(!est_connecter()){
    header('location:../../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        h1{
            text-align: center;
            top: 300px;
        }
    
        .d1 {
         text-align: center; 
        background-color: whitesmoke; 
        color: #333; 
        padding: 10px; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
        font-size: 30px; 
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        th{
            background-color: #333;
            color: whitesmoke;
            border: 2px solid #fff;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php ?>

    
    
