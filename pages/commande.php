<?php
if (isset($_GET['id'])) {
    $_SESSION['id_produit'] = $_GET['id'];
}
if (isset($_SESSION['id_produit'])) {
    $produit = new ProduitDB($cnx);
    $monproduit = $produit->getProduit($_SESSION['id_produit']);
}

if (isset($_GET['acheter'])) {
    $commande = new CommandeDB($cnx);
    $commande->addCommande(array("id_client" => $_SESSION['mon_client'], "id_produit" => $_SESSION['id_produit'], "prix" => $monproduit[0]['prix']));
    $produit = new ProduitDB($cnx);
    $produit->updateStock($_SESSION['id_produit']);
    
    ?>
    <meta http-equiv = "refresh": content = "2;url=index.php?page=photo">
    <?php
   
}
?>

</br></br>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
    <table class="table table-hover table-dark">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type de produit</th>
                <th scope="col">Description du produit </th>
                <th scope="col">Prix</th>
                <th scope="col">Panier</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><img src="./admin/images/<?php print $monproduit[0]['image'] ?>" alt="Produit"/></th>
                <td> <?php
                    print utf8_decode($monproduit[0]['type']);
                    ?></td>
                <td>  <?php
                    print utf8_decode($monproduit[0]['description']);
                    ?></td>
                <td> <?php
                    print utf8_decode($monproduit[0]['prix']);
                    ?>€</td>
                <td>  
                    <input type="submit" button type="button" name="acheter" id="acheter" value="Ajouter au panier" class="btn btn-secondary">&nbsp;  

                    <button type="button" value="Annuler" class="btn btn-secondary" onClick="javascript:document.location.href = 'index.php?page=catalogue'" /> Retour  </button>

                </td>

            </tr>




        </tbody>
    </table>


    <?php
    ?>

</div> 