<?php
if (isset($_SESSION['admin'])) {
    
    if (isset($_GET['envoyer'])) {
    extract($_GET, EXTR_OVERWRITE);

    $produit = new ProduitDB($cnx);
    //var_dump($_GET);
    $produit->addProduit($_GET);
    ?>

    <?php
        }
    ?>
<div class="text-center" style="padding:50px">
    <div class="logo">Ajout Produit</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_inscription">
            <form id="register-form" class="text-left">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">

                        <div class="form-group">
                            <label for="id_produit" class="sr-only">ID du produit</label>
                            <input type="text" class="form-control" id="id_produit" name="id_produit" size="30" placeholder="ID du produit">
                        </div>

                        <div class="form-group">
                            <label for="type" class="sr-only">Type)</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="1:photo 2:template">
                        </div>

                        <div class="form-group">
                            <label for="description" class="sr-only">Description</label>
                            <input type="text" id="description" class="form-control" name="description" placeholder="description">
                        </div>
                        <div class="form-group">
                            <label for="stock" class="sr-only">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
                        </div>
                        <div class="form-group">
                            <label for="prix" class="sr-only">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix">
                        </div>

                        <div class="form-group">
                            <label for="image" class="sr-only">Fichier image</label>
                            <input type="text" class="form-control" id="image" name="image" placeholder="Fichier image">
                        </div>
                    </div>

                    <button type="submit" name="ajouter" id="ajouter" value="Envoyer">Ajouter</button>
                </div>
            </form>
    </div>
    <!-- end:Main Form -->
</div>

<?php
}
?>

