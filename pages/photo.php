<?php
$info = new ProduitDB($cnx);
$liste_produit = $info->getProduitPhoto();
$nbrProduit = count($liste_produit);
//var_dump($liste_photo;
?>

</br></br>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">Description </th>
      <th scope="col">Prix</th>
      <th scope="col">Stock</th>
      <th scope="col">Panier</th>
    </tr>
  </thead>
  <tbody>
    <tr>
          <?php
    for ($i = 0; $i < $nbrProduit; $i++) {
        ?>

      <th scope="row"><img src="./admin/images/<?php print $liste_produit[$i]['image'] ?>" alt="Jeux"/></th>
      <td> <?php
        print utf8_decode($liste_produit[$i]['description']);
        ?></td>
      <td>  <?php
        print utf8_decode($liste_produit[$i]['prix']);
        ?></td>
      <td> <?php
        print utf8_decode($liste_produit[$i]['stock']);
        ?></td>
      <td>  <?php 
          if (isset($_SESSION['client']) OR isset($_SESSION['admin'])) {
          ?>
          <a href="index.php?page=commande&id=<?php print $liste_produit[$i]['id_produit']; ?>">
          Ajouter au panier
          </a>
          <?php }else{
          print " Vous devez être connecté pour commander";
          }
         
        ?></td>
    </tr>
    
    <?php
}
?>
      </tbody>
</table>


<a href='./pages/imprimer.php' target='_blank'>Imprimer la liste des photos</a>
</div>  
