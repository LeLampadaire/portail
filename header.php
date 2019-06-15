    <br><br><br><br>
    <div class="header headerTop FondOpacity">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a href="index.php" class="btn btn-primary btn-danger buttonColor"><img src="images/icons-32/home.png"></span> Zaap</a>
                </li>
                <li class="nav-item">
                    <a href="serveur.php" class="btn btn-primary btn-danger buttonColor"><img src="images/icons-32/compass.png"></span> Portail</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="btn btn-primary btn-danger buttonColor"><img src="images/icons-32/speech_4.png"></span> Contact</a>
                </li>
                <?php if(empty($_SESSION)){ ?>
                    <li class="nav-item">
                        <a href="connexion.php" class="btn btn-primary btn-danger buttonColor"><img src="images/icons-32/power.png"></span> Connexion</a>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a href="compte.php" class="btn btn-primary btn-danger buttonColor"><img src="images/icons-32/user.png"></span> Compte</a>
                    </li>
                    <li class="nav-item">
                        <a href="deconnexion.php" class="btn btn-primary btn-danger buttonColor"><img src="images/icons-32/power.png"></span> Deconnexion</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>