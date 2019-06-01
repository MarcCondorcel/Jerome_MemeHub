<?php
if (isset($_SESSION['client'])) {
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php?page=accueil">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?page=contact">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./index.php?page=catalogue" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catalogue
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./index.php?page=photo">Photos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./index.php?page=template">Templates</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./index.php?page=catalogue" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Espace membre
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./index.php?page=espaceclient">Mon profil</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./admin/pages/disconnect.php">Me déconnecter</a>
                    </div>
                </li>
            </ul>
             <button data-toggle="modal" href="#infos" class="btn btn-warning">Memes populaires </button>
            <div class="modal" id="infos">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                            <h4 class="modal-title">Approuvé par Reddit
                                  </h4>
                        </div>
                        <div class="modal-body">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="./admin/images/chrome.png" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="./admin/images/tutorial.png" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="./admin/images/bootstrap.png" alt="Third slide">
                                        </div>
                                    </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<?php } else {
    ?>
    <a href="" class="navbar-brand collapse navbar-collapse">
            <img src="./admin/images/memehub.png" alt="MemeHub" class="topLogo"/>          
            </a>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <img src="./admin/images/logo.png" alt="logo"/> -->
        <img src="./admin/images/small_banner.png" alt="logoPortee"/>&nbsp;    
        <span class="navbar-toggler-icon"></span>&nbsp;
        <a href="index.php?page=login.php" class="black font-weight-bold">
            <i class="fas fa-key"></i> <!-- ou autre icône -->
        </a>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php?page=accueil">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?page=contact">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./index.php?page=catalogue" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catalogue
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./index.php?page=photo">Photos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./index.php?page=template">Templates</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./index.php?page=catalogue" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Espace membre
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./index.php?page=login">Administration</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./index.php?page=inscription">Inscription</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./index.php?page=connexion">Connexion</a>
                    </div>
                </li>
            </ul>
            <button data-toggle="modal" href="#infos" class="btn btn-warning">Memes populaires </button>
            <div class="modal" id="infos">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                            <h4 class="modal-title">Approuvé par Reddit
                                  </h4>
                        </div>
                        <div class="modal-body">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="./admin/images/chrome.png" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="./admin/images/tutorial.png" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="./admin/images/bootstrap.png" alt="Third slide">
                                        </div>
                                    </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<?php } ?>
