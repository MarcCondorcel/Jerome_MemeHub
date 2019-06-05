
<?php
$info = new ProduitDB($cnx);
$liste_produit = $info->getProduitPhoto();
$nbrProduit = count($liste_produit);
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

      <th scope="row"><img src="./images/<?php print $liste_produit[$i]['image'] ?>" alt="Photo"/></th>
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
           if (isset($_SESSION['admin'])) {
          ?>
          <a href="index.php?page=SupprimerProduit&id=<?php print $liste_produit[$i]['id_produit']; ?>">
          Supprimer
          </a>
          <?php }else{
          print " Vous devez être connecté pour Supprimer";
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
