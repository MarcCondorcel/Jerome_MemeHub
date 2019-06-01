<?php
$info = new ProduitDB($cnx);
$liste_template = $info->getProduitTemplate();
$nbrTemplate = count($liste_template);
//var_dump($liste_photo;
?>

</br></br>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Template</th>
      <th scope="col">Description </th>
      <th scope="col">Prix</th>
      <th scope="col">Stock</th>
      <th scope="col">Panier</th>
    </tr>
  </thead>
  <tbody>
    <tr>
          <?php
    for ($i = 0; $i < $nbrTemplate; $i++) {
        ?>

      <th scope="row"><img src="./admin/images/<?php print $liste_template[$i]['image'] ?>" alt="Template"/></th>
      <td> <?php
        print utf8_decode($liste_template[$i]['description']);
        ?></td>
      <td>  <?php
        print utf8_decode($liste_template[$i]['prix']);
        ?></td>
      <td> <?php
        print utf8_decode($liste_template[$i]['stock']);
        ?></td>
      <td>  <?php 
          if (isset($_SESSION['client']) OR isset($_SESSION['admin'])) {
          ?>
          <a href="index.php?page=commande&id=<?php print $liste_template[$i]['id_produit']; ?>">
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


<a href='./pages/imprimer.php' target='_blank'>Imprimer la liste des templates</a>
</div>  
