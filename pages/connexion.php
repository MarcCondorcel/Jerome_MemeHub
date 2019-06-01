<?php
if (isset($_POST['envoyer2'])) {
    $log = new ClientDB($cnx);
    $client = $log->isClient($_POST['email3'], $_POST['password3']);

    if (is_null($client)) {
        
    } else {
        $_SESSION['client'] = 1;

        $_SESSION['mon_client'] = $client[0]->id_client;
        ?>
        <meta http-equiv = "refresh": content = "0;url=index.php?page=photo">
        <?php

    }
}
?>
        

<div class="text-center" style="padding:70px 0">
    <div class="logo">Se connecter</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post" id="form_connexion">
            <form id="login-form" class="text-left">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="email3" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email3" name="email3" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="password3" class="sr-only">Mot de passe</label>
                            <input type="password" class="form-control" id="password3" name="password3" placeholder="password">
                        </div>
                        <div class="form-group login-group-checkbox">
                            <input type="checkbox" id="lg_remember" name="lg_remember">
                            <label for="lg_remember">Se souvenir</label>
                        </div>
                    </div>
                    <button type="submit" class="login-button" name="envoyer2" id="envoyer2" value="Connexion"><i class="fa fa-chevron-right"></i></button>
                      <!--- <input type="submit" button type="button" name="envoyer2" id="envoyer2" value="Connexion" class="btn btn-info">&nbsp; --->
                </div>
                <div class="etc-login-form">
                    <p>new user? <a href="./index.php?page=inscription">S'inscrire</a></p>
                </div>
            </form>
    </div>
    <!-- end:Main Form -->
</div>

