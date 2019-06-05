<?php include './lib/php/verifier_connexion.php'; ?>

<h3> Accueil Admin </h3>

<h4>Bienvenue sur la page d'administration du site MemeHub</h4>

<?php

//récupération des produits
$vue = new ProduitDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getProduitAll();
$nbr = count($liste);
?>
<h2>Tableau de données memes</h2>
<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">Type</th>
            <th class="ecart">Description</th>
            <th class="ecart">Prix</th>
            <th class="ecart">Stocks</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_produit']; ?></td>
                <td><span contenteditable="true" name="type" class="ecart" id="<?php print $liste[$i]['id_produit']; ?>">
                        <?php print $liste[$i]['type']; ?></span>
                </td>
                <td><span contenteditable="true" name="description" class="ecart" id="<?php print $liste[$i]['id_produit']; ?>">
                        <?php print $liste[$i]['description']; ?></span>
                </td>
                <td><span contenteditable="true" name="prix" class="ecart" id="<?php print $liste[$i]['id_produit']; ?>">
                        <?php print $liste[$i]['prix']; ?></span>
                </td>
                <td><span contenteditable="true" name="stock" class="ecart" id="<?php print $liste[$i]['id_produit']; ?>">
                        <?php print $liste[$i]['stock']; ?></span>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>

