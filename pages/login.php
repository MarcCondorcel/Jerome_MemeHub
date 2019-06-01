
<?php 
//si on a cliqué sur le bouton d'envoi du formulaire
if(isset($_POST['submit_login'])){
    //pour pouvoir utiliser les données hors tabl $_GET ou $_POST
    extract($_POST,EXTR_OVERWRITE);
    $log = new AdminDB($cnx);
    //$admin et $password sont les noms des champs du formulaire
    $admin = $log->getAdmin($login, $password);
    //var_dump($admin);
    if(is_null($admin)){
        print "<br/>Données incorrectes";        
    }
    else {
        $_SESSION['admin']=1;
        unset($_SESSION['page']);        
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/index.php\">";
    }
    
}
?>
<div class="text-center" style="padding:70px 0">
    <div class="logo">Login administration</div>
    <div class="login-form-1">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post" id="form_connexion">
            <form id="login-form" class="text-left">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="login" class="sr-only">Login</label>
                        <input type="text" name="login" id="admin" placeholder="login"/><br/>
                    </div>
                    <div class="form-group">
                        <label for="password3" class="sr-only">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="password"/>
                    </div>
                    <button type="submit" class="login-button" name="submit_login" id="sumbit_login" value="Se Connecter"><i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>



