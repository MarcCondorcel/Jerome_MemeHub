<?php
if (isset($_SESSION['mon_client'])) {
    $commande = new CommandeDB($cnx);
    //var_dump($commande);
    $commande_client = $commande->getCommandeClient($_SESSION['mon_client']);
    //var_dump($commande_client);
}

if (isset($_GET['id'])) {
    $_SESSION['id_produit'] = $_GET['id'];
}
if (isset($_SESSION['id_produit'])) {
    $produit = new ProduitDB($cnx);
    $monproduit = $produit->getProduit($_SESSION['id_produit']);
}

if (isset($_GET['supprimer'])) {
    $commande = new CommandeDB($cnx);
    $commande_cli = $commande->getCommandeClient($_SESSION['mon_client']);
    $commande_client = $commande->getCommandeClient($_SESSION['mon_client']);
    $commande->delCommande(array("id_client" => $_SESSION['mon_client'], "id_produit" => $_SESSION['id_produit']));
    var_dump($_SESSION);
}
?>

<?php
$cmp = 0;
$code = 0;
$str = 'EXAM';
?>
</br></br>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
    <table class="table table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">Référence du meme</th>
                <th scope="col">Votre numéro de client </th>
                <th scope="col">Prix</th>
                <th scope="col">Supprimer cet article</th>
            </tr>
        </thead>
        <tbody><?php
for ($i = 0; $i < sizeof($commande_client); $i++) {
    ?>
                <tr class="table-danger">
                    <th scope="row"><?php print $commande_client[$i]['id_produit'] ?></th>
                    <td> <?php
            print utf8_decode($commande_client[0]['id_client']);
            ?></td>
                    <td>  <?php
                        print utf8_decode($commande_client[$i]['prix']);
                        $cmp = $cmp + ($commande_client[$i]['prix']);
                        ?></td>
                    <td>  
                        <a href="index.php?page=mon_panier&id=<?php print $commande_client[$i]['id_produit']; ?>">
                            Supprimer du panier
                        </a>

                </tr>
    <?php
}
print '<center><b> Vous avez ' . $i . ' article(s) pour un montant total de : ' . $cmp . ' €</b></center>';
?>
        </tbody>

    </table>









    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Valider mon panier
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mon panier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="py-5 text-center">

                            <div class="row">
                                <div class="col-md-4 order-md-2 mb-4">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Moyens de paiement</span>
                                        <span class="badge badge-secondary badge-pill">3</span>
                                    </h4>
                                    <ul class="list-group mb-3">


                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">Montant du panier</h6>
                                                <small class="text-muted"></small>
                                            </div>
                                            <span class="text-muted"><?php print $cmp . '€' ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-light">
                                            <div class="text-success">
                                                <h6 class="my-0">Promo code</h6>
                                                <small>Vous avez un code promo ?</small>
<?php
if ($code === 'EXAM') {
    $cmp = $cmp - (($cmp * 3) / 10);
}
?>
                                            </div>
                                            <span class="text-success"><?php print $code ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>Total (€)</span>
                                            <strong><?php print $cmp + $code . '€' ?></strong>
                                        </li>
                                    </ul>

                                    <form class="card p-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Promo code">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-secondary">Valider</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-8 order-md-1">
                                    <h4 class="mb-3">Adresse de facturation</h4>
                                    <form class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">Prénom</label>
                                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                                <div class="invalid-feedback">
                                                    Le prénom doit être entré
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName">Nom</label>
                                                <input type="text" class="form-control" id="lastName" placeholder="name" value="" required>
                                                <div class="invalid-feedback">
                                                    Le prénom doit être entré
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="you@example.com" value="" required>
                                                <div class="invalid-feedback">
                                                    L'adresse email doit être entrée
                                                </div>

                                                <div class="col-md-20 mb-20">
                                                    <label for="address">Adresse</label>
                                                    <input type="text" class="form-control" id="address" placeholder="76 rue des...t" required>
                                                    <div class="invalid-feedback">
                                                        L'adresse doit être entrée
                                                    </div>
                                                </div>

                                                <div class="col-md-20 mb-12">
                                                    <label for="address2">Adresse 2 <span class="text-muted">(Optional)</span></label>
                                                    <input type="text" class="form-control" id="address2" placeholder="Appartement ou boîte">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-20 mb-3">
                                                    <label for="country">Pays</label>
                                                    <select class="custom-select d-block w-100" id="country" required>
                                                        <option value="">Votre pays</option>
                                                        <option>France</option>
                                                        <option>Belgique</option>
                                                        <option>Pays-bas</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Sélectionnez un pays parmi la liste
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <hr class="mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="same-address">
                                            <label class="custom-control-label" for="same-address">L'adresse de facturation est la même que l'adresse de domicile</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-info">
                                            <label class="custom-control-label" for="save-info">Sauver ces informations pour la prochaine fois</label>
                                        </div>
                                        <hr class="mb-4">

                                        <h4 class="mb-3">Paiement</h4>

                                        <div class="d-block my-3">
                                            <div class="custom-control custom-radio">
                                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                                <label class="custom-control-label" for="credit">Credit card</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                                <label class="custom-control-label" for="debit">Debit card</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                                <label class="custom-control-label" for="paypal">PayPal</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="cc-name">Nom du propriétaire de la carte</label>
                                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                                <small class="text-muted">Full name as displayed on card</small>
                                                <div class="invalid-feedback">
                                                    Le nom est requis
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="cc-number">Numéro de carte de crédit</br></label>
                                                <input type="text" class="form-control" id="cc-number" placeholder="--- --- ----" required>
                                                <div class="invalid-feedback">
                                                    Le numéro de carte de crédit est requis
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="cc-expiration">Date d'expiration</label>
                                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                                <div class="invalid-feedback">
                                                    La date d'expiration est requise
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="cc-cvv">CVV</label>
                                                <input type="text" class="form-control" id="cc-cvv" placeholder="Code au dos de votre carte" required>
                                                <div class="invalid-feedback">
                                                    Le code de sécurité est requis
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <button class="btn btn-secondary" type="submit">Valider</button>
                                        <button type="close" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

    </div>