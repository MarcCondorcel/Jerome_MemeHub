<?php
if (isset($_GET['id'])) {
    $_SESSION['id_produit'] = $_GET['id'];
}
if (isset($_SESSION['id_produit'])) {
    $produit = new ProduitDB($cnx);
    $monproduit = $produit->getProduit($_SESSION['id_produit']);
}

if (isset($_GET['supprimer'])) {
    $commande = new CommandeDB($cnx);
    $commande->delCommande($_SESSION['mon_client'],$_SESSION['id_produit']);
    
    
    ?>
    <meta http-equiv = "refresh": content = "2;url=index.php?page=mon_panier">
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
                    <input type="submit" button type="button" name="supprimer" id="supprimer" value="Supprimer du panier" class="btn btn-secondary">&nbsp;  

                    <button type="button" value="Annuler" class="btn btn-secondary" onClick="javascript:document.location.href = 'index.php?page=mon_panier'" /> Retour  </button>

                </td>

            </tr>




        </tbody>
    </table>


    <?php
    ?>

</div> 