<?php
if(isset($_GET['submit_login'])){
    //if isset $_POST
    
    //var_dump($_GET);
    //pour pouvoir utiliser les donnes hors du tab $_get
    extract($_GET,EXTR_OVERWRITE);
    //extract $_POST 
    $log= new AdminDB($cnx);
    //var_dump($log); 
    $admin=$log->getAdmin($admin, $password);
    //var_dump($admin);
    if(is_null($admin)){
        print "<br/>Données incorrectes";
    }
    else
    {
        $_SESSION['admin']=1;
        unset($_SESSION['page']);
        
       print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/pages/accueil_admin.php>";
    }
}
?>


<div class="text-center" style="padding:70px 0">
    <div class="logo">Se connecter</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <!---   <form action=" method="post"> --->
            <form id="login-form" class="text-left">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="admin" class="sr-only">Login</label>
                            <input type="admin" class="form-control" id="admin" name="admin">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        
                    </div>
                     

                    <button type="submit" class="btn btn-secondary" name="submit_login" id="submit_login" value="Se connecter">Se connecter</button>
                      <!--- <input type="submit" button type="button" name="envoyer2" id="envoyer2" value="Connexion" class="btn btn-info">&nbsp; --->
                </div>
                <div class="etc-login-form">
                    <p>new user? <a href="./index.php?page=inscription">S'inscrire</a></p>
                </div>
            </form>
    </div>
    <!-- end:Main Form -->
</div>

