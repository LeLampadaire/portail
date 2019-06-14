<!DOCTYPE html>
<html>
    <?php include 'configuration.php' ?>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="images/favicon.ico" />
        <title><?php echo "$NomSite"; ?> - Compte</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>

<body>
    <!-- HEADER -->
    <?php include('header.html'); ?>
    <!-- HEADER -->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="container" style="background-image: url(images/compte/PandaM.jpg); background-size: 100% auto; background-repeat: no-repeat; border-style: solid; max-width: 50%; height: auto;">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <img src="images/logo.png" class="solid">
                        <div class="row">
                            <div class="offset-md-6 col-md-3 ">
                                <div class="w3-display-container">
                                    <img src="images/ornement/1.png" alt="Ornement" style="width:100%">
                                    <p class="w3-display-middle"><br>PSEUDO</p>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: -100px;">
                            <p>Serveur : SERVEUR</p>
                            <p>Date d'inscription : xx/xx/xxxx</p>
                            <p>Nombre de validation total : XXX</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                            <p>Expérience :</p>
                        <div class="progress tailleMaxProgressBar">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    
    <br>

    <div class="row" class="modification">
            <div class="offset-lg-3 col-lg-2 text-center">
                <button type="button" class="btn btn-warning">Modifier son mot de passe</button>
            </div>

            <div class="col-lg-2 text-center">
                <button type="button" class="btn btn-info">Modifier son logo</button>
            </div>
            
            <div class="col-lg-2 text-center">
                <button type="button" class="btn btn-dark">Modifier le background</button>
            </div>
    </div>

    <!-- FOOTER -->
    <?php include('footer.html'); ?>
    <!-- FOOTER -->

</body>
</html>