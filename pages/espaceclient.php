<?php
if (isset($_SESSION['mon_client'])) {
    $client = new ClientDB($cnx);
    $cli_co = $client->getClient($_SESSION['mon_client']);
}
?>


<div class="row"></br></br></br></div>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Mon profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=mon_panier">Mon panier</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h5 class="card-title">Bienvenue <?php print utf8_decode($cli_co[0]['prenom']); ?></h5>
        <p class="card-text"><div class="container">
            <div class="span3 well">
                <center>
                    <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="./admin/images/profil.png" name="aboutme" width="140" height="140" class="img-circle"></a>
                    <h3><?php print utf8_decode($cli_co[0]['nom'] . ' ' . $cli_co[0]['prenom']); ?></h3>
                    <em>Clique sur ta photo</em>
                </center>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <center> <h4 class="modal-title" id="myModalLabel">à propos de moi </h4></center>
                        </div>
                        <div class="modal-body">
                            <center>
                                <img src="./admin/images/profil.png" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                                <h3 class="media-heading"><?php print utf8_decode($cli_co[0]['nom'] . ' ' . $cli_co[0]['prenom']); ?></h3>

                            </center>
                            <hr>
                            <center>
                               <p class="text-left"> <strong>Mon adresse :  </strong>
                                <span class="label label-warning"><?php print utf8_decode($cli_co[0]['adresse']); ?></span>
                                <span class="label label-info"><?php print utf8_decode($cli_co[0]['localite']); ?></span></br>
                                <strong> Mon adresse email : </strong><?php print utf8_decode($cli_co[0]['email']); ?>
                                    </br><strong> Mon numéro de téléphone : </strong><?php print utf8_decode($cli_co[0]['tel']); ?></p>
                                <br>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                            </center>
                        </div>
                    </div>
                </div> 
            </div>

        </div>
