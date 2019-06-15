<?php session_start();

    require_once 'configuration.php';
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="images/favicon.ico" />
        <title><?php echo $NomSite; ?> - Accueil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    </head>

<body>
    <!-- HEADER -->
    <?php include('header.php'); ?>
    <!-- HEADER -->

    <br>

    <div class="row">
        <div class="col-lg-12 card mb-3 ZaapInfo solid">
            <img src="images/zaap.png" class="ZaapCenter" alt="Zaap" min-width="256px" min-height="256px">
            <div class="card-body">
                <p class="card-title text-align white Forte" style="font-size: 30px;">Informations sur le site : </p>
                <p class="card-text text-align white">
                    Le site <?php echo $NomSite; ?> a été réalisé par Lampadaire : <img src="images/lampadaire.png" alt="Lampadaire"><br>
                    <img src="images/memory.png" alt="Memory"> : Meneur de la guilde Memory du serveur Nidas : <img src="images/nidas.png" alt="Nidas"><br><br>
                    C'est un site totalement gratuit et mis votre disposition ! <br><br>
                    Dans la barre de navigation, <a href="portail.php" class="btn btn-primary btn-danger buttonColor"><img src="images/icons-32/compass.png"></span> Portail</a> est la page principalement utile du site !<br><br>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="text-right">
                        <p class="card-text white">Si vous voulez me faire un don</p>
                        <input type="hidden" name="cmd" value="_s-xclick" target="_blank" />
                        <input type="hidden" name="hosted_button_id" value="JPFPWFRW2T7BJ" target="_blank" />
                        <input type="image" src="https://www.paypalobjects.com/fr_FR/BE/i/btn/btn_donateCC_LG.gif" target="_blank"  name="submit" title="PayPal - Le moyen le plus sûr et le plus facile de payer en ligne !" alt="Button Don Paypal" />
                        <img alt="" target="_blank" src="https://www.paypal.com/fr_BE/i/scr/pixel.gif" width="1" height="1" />
                    </form>
                </p>
                <p class="card-text"><small class="text-muted">Dernière mise à jour : <?php echo $MiseAJour; ?></small></p>
            </div>
        </div>
    </div>

    <br>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="container fondColor solid">
                    <img src="images/icons-128/iphone.png" alt="responsive" class="imageEx">
                    <p>Un site responsive afin d'avoir toujours envie d'y aller même avec son téléphone.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="container fondColor solid">
                    <img src="images/icons-128/code.png" alt="maj" class="imageEx">
                    <p>Des mises à jour seront toujours disponibles afin d'avoir une meilleur qualité.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="container fondColor solid">
                    <img src="images/icons-128/user_circle.png" alt="ecoute" class="imageEx">
                    <p>Le Web Developer est à l'écoute pour des améliorations.</p>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- FOOTER -->
    <?php include('footer.php'); ?>
    <!-- FOOTER -->

</body>
</html>