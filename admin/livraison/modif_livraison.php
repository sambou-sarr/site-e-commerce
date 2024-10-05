<?php
require_once("../../connection.php");

$sql = "SELECT * FROM commande";
$commandes = $db->query($sql)->fetchAll();

$sql = "SELECT * FROM livreur";
$livreurs = $db->query($sql)->fetchAll();

$id = $_GET['id'];
$sql = "SELECT * FROM livraison WHERE id_livraison = ?";
$prepare = $db->prepare($sql);
$prepare->execute([$id]);
$livraison = $prepare->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['commande']) && isset($_POST['date']) && isset($_POST['livreur']) && isset($_POST['adresse'])) {
    $commande = $_POST['commande'];
    $date = $_POST['date'];
    $livreur = $_POST['livreur'];
    $adresse = $_POST['adresse'];

    try { 
        $sql = "UPDATE livraison SET id_commande = ?, date_livraison = ?, id_livreur = ?, adresse_livraison = ? WHERE id_livraison = ?";
        $prepare = $db->prepare($sql);
        $prepare->execute([$commande, $date, $livreur, $adresse, $id]);

        // Redirection après succès de la modification
        header('Location: liste_livraison.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la modification : " . $e->getMessage();
    }
}

require_once('../layout/header.php');
?>

<h1 class="display-3"> <i class="bi bi-plus-circle"> Modification livraison </i></h1>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="d1">
                <form action="" method="POST">
                    <div class="mb-1">
                        <label class="form-label"><h5>Commande</h5></label>
                        <select name="commande" id="" class="form-control">
                            <?php foreach ($commandes as $commande) : ?>
                                <option value="<?= $commande['id_cmd'] ?>" <?= $livraison['id_commande'] == $commande['id_cmd'] ? 'selected' : '' ?>>
                                    Commande numéro : <strong><?= $commande['id_cmd'] ?></strong>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-1">
                        <label class="form-label"><h5>Date de livraison</h5></label>
                        <input type="date" class="form-control" name="date" value="<?= $livraison['date_livraison'] ?>">
                    </div>

                    <div class="mb-1">
                        <label class="form-label"><h5>Livreur</h5></label>
                        <select name="livreur" id="" class="form-control">
                            <?php foreach ($livreurs as $livreur) : ?>
                                <option value="<?= $livreur['id_livreur'] ?>" <?= $livraison['id_livreur'] == $livreur['id_livreur'] ? 'selected' : '' ?>>
                                    ( <?= $livreur['id_livreur'] ?> ) <?= $livreur['prenom_livreur'] ?> <?= $livreur['nom_livreur'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-1">
                        <label class="form-label"><h5>Adresse</h5></label>
                        <input type="text" class="form-control" name="adresse" value="<?= $livraison['adresse_livraison'] ?>">
                    </div>

                    <div class="mb-1">
                        <button type="submit" class="btn btn-success">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4"></div>

<?php require_once('../layout/footer.php'); ?>
