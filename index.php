<?php
require './admin/lib/php/adm_list_include.php';
$cnx = Connexion :: getInstance($dsn, $user, $pass);
session_start();
//var_dump($cnx);
?>
<html>
        <head>
            <title id="titremain">The Meme Lord</title>       
  <!--Vérifier les redondances --> 
        <link rel="stylesheet" type="text/css" href="admin/lib/css/bootstrap-4.0.0/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/mycss.css" />
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="admin/lib/js/jquery-3.2.1.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="admin/lib/css/bootstrap-4.0.0-beta-dist/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script type="text/javascript" src="admin/lib/js/dist/jquery.validate.js"></script>
        <script src="./admin/lib/js/gt_functionsVal.js"></script>
        <script src="./admin/lib/js/gt_function.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    

        <meta charset="utf8"/>

        </head>

    <body>
   
        <div class="container2">
            <nav>
                <?php
                if (file_exists('./lib/php/p_gt_menu.php')) {
                    include ('./lib/php/p_gt_menu.php');
                }
                ?>   

            </nav>


            <div class="col-sm-10">


                <section id="main">
                    <?php
                    if (!isset($_SESSION['page'])) {
                        $_SESSION['page'] = "accueil";
                    }
                    if (isset($_GET['page'])) {
                        $_SESSION['page'] = $_GET['page'];
                    }
                    $path = './pages/' . $_SESSION['page'] . '.php';
                    if (file_exists($path)) {
                        include ($path);
                    } else {
                        ?>
                        <span class="lefcolumn">Page introuvable</span>
                        <meta http-refresh: Content="1;url=index.php?page=accueil"/>
                        <?php
                    }
                    ?>  
                </section>
            </div>



            <footer class="footer">
                <?php
                if (file_exists('./lib/php/p_gt_footer.php')) {
                    include ('./lib/php/p_gt_footer.php');
                }
                ?>       
            </footer>  

        </div>
    </div>
</div>		
</body>
</html>