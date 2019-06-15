<?php session_start();

    $IdPseudo = $_SESSION['idprofil'];
    $Pseudo = $_SESSION['pseudo'];

    require_once 'configuration.php';
    require_once 'dbb_connexion.php';

    $compte = mysqli_query($bdd, 'SELECT id, serveur, photo, fond, validation_totale-report_totale as valid, DATE_FORMAT(date_inscription, "%d/%m/%Y") as date_inscription FROM membres WHERE id='.$IdPseudo.';');
    $compte = mysqli_fetch_array($compte, MYSQLI_ASSOC);

    if(!empty($_POST['fond'])){
        mysqli_query($bdd, 'UPDATE membres SET fond="'.$_POST['fond'].'" WHERE id='.$IdPseudo.';');
        header('Location: compte.php');
    }else if(!empty($_POST['mdp'])){
        $mdp = md5($_POST['mdp']);
        mysqli_query($bdd, 'UPDATE membres SET mdp="'.$mdp.'" WHERE id='.$IdPseudo.';');
    }else if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0 ){
      $extension_upload = strtolower( substr( strrchr($_FILES['photo']['name'], '.') ,1) );
      if($extension_upload == "jpg" || $extension_upload == "png" || $extension_upload == "jpeg" || $extension_upload == "svg"){
        $nomphoto = "images/profil/".$IdPseudo.".{$extension_upload}";
        $bddphoto = "".$IdPseudo.".{$extension_upload}";
        $move = move_uploaded_file($_FILES['photo']['tmp_name'],$nomphoto);
        mysqli_query($bdd, 'UPDATE membres SET photo = "'.$bddphoto.'" WHERE id = '.$IdPseudo.';');
        header('Location: compte.php');
      }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" />
    <title><?php echo $NomSite; ?> - Compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="jquery/chosen.css">
    <link rel="stylesheet" href="jquery/ImageSelect.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="jquery/chosen.jquery.js"></script>
    <script src="jquery/ImageSelect.jquery.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <!-- HEADER -->
    <?php include('header.php'); ?>
    <!-- HEADER -->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="container" style="background-image: url(images/compte/<?php echo $compte['fond']; ?>); background-size: 100% auto; background-repeat: no-repeat; border-style: solid; max-width: 50%; height: auto;">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <img src="images/profil/<?php echo $compte['photo']; ?>" class="solid" width="200px">
                        <div class="row">
                            <div class="offset-md-6 col-md-3 ">
                                <div class="w3-display-container">
                                    <?php 
                                        if($compte['valid'] >= 0 && $compte['valid'] < 10){
                                            echo '<img src="images/ornement/1.png" alt="Ornement" style="width:100%">';
                                            $niveau = '<progress class="progress-bar" max="10" value="'.$compte['valid'].'" style="width:300px;"></progress>';
                                            $level = 1;
                                        }else if($compte['valid'] >= 10 && $compte['valid'] < 20){
                                            echo '<img src="images/ornement/2.png" alt="Ornement" style="width:100%">';
                                            $niveau = '<progress class="progress-bar" max="20" value="'.$compte['valid'].'" style="width:300px;"></progress>';
                                            $level = 2;
                                        }else if($compte['valid'] >= 20 && $compte['valid'] <= 50){
                                            echo '<img src="images/ornement/3.png" alt="Ornement" style="width:100%">';
                                            $niveau = '<progress class="progress-bar" max="50" value="'.$compte['valid'].'" style="width:300px;"></progress>';
                                            $level = 3;
                                        }
                                    ?>
                                    
                                    <p class="w3-display-middle"><br><?php echo $Pseudo; ?></p>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: -100px;">
                            <br>
                            <p>Date d'inscription : <?php echo $compte['date_inscription']; ?></p>
                            <p>Nombre de validation total : <?php echo $compte['valid']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <p>Expérience : <?php echo $level.'/3'; ?></p>
                        <?php echo $niveau; ?>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    
    <br>

    <div class="row" class="modification">
    
        <div class="offset-lg-3 col-lg-2 text-center">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModifMDP">Modifier son mot de passe</button>
        </div>
        
        <div class="col-lg-2 text-center">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModifPhoto">Modifier son logo</button>
        </div>

        <div class="col-lg-2 text-center">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#choixFondModif">Modifier le background</button>
        </div>

    </div>
    
    <div class="modal fade" id="choixFondModif" tabindex="-1" role="dialog" aria-labelledby="choixFondModifTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="choixFondModifTitle">Modifier le background</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <select id="choixFond" name="fond">
                            <option data-img-src="images/compte/CraF.jpg" value="CraF.jpg" <?php if($compte['fond'] == "CraF.jpg"){ echo 'selected'; } ?>>Cra F</option>
                            <option data-img-src="images/compte/CraM.jpg" value="CraM.jpg" <?php if($compte['fond'] == "CraM.jpg"){ echo 'selected'; } ?>>Cra M</option>
                            <option data-img-src="images/compte/EcaflipF.jpg" value="EcaflipF.jpg" <?php if($compte['fond'] == "EcaflipF.jpg"){ echo 'selected'; } ?>>Ecaflip F</option>
                            <option data-img-src="images/compte/EcaflipM.jpg" value="EcaflipM.jpg" <?php if($compte['fond'] == "EcaflipM.jpg"){ echo 'selected'; } ?>>Ecaflip M</option>
                            <option data-img-src="images/compte/ElioF.jpg" value="ElioF.jpg" <?php if($compte['fond'] == "ElioF.jpg"){ echo 'selected'; } ?>>Eliotrope F</option>
                            <option data-img-src="images/compte/ElioM.jpg" value="ElioM.jpg" <?php if($compte['fond'] == "ElioM.jpg"){ echo 'selected'; } ?>>Eliotrope M</option>
                            <option data-img-src="images/compte/EniF.jpg" value="EniF.jpg" <?php if($compte['fond'] == "EniF.jpg"){ echo 'selected'; } ?>>Eniripsa F</option>
                            <option data-img-src="images/compte/EniM.jpg" value="EniM.jpg" <?php if($compte['fond'] == "EniM.jpg"){ echo 'selected'; } ?>>Eniripsa M</option>
                            <option data-img-src="images/compte/EnutrosorF.jpg" value="EnutrosorF.jpg" <?php if($compte['fond'] == "EnutrosorF.jpg"){ echo 'selected'; } ?>>Enutrosor F</option>
                            <option data-img-src="images/compte/EnutrosorM.jpg" value="EnutrosorM.jpg" <?php if($compte['fond'] == "EnutrosorM.jpg"){ echo 'selected'; } ?>>Enutrosor M</option>
                            <option data-img-src="images/compte/FecaF.jpg" value="FecaF.jpg" <?php if($compte['fond'] == "FecaF.jpg"){ echo 'selected'; } ?>>Feca F</option>
                            <option data-img-src="images/compte/FecaM.jpg" value="FecaM.jpg" <?php if($compte['fond'] == "FecaM.jpg"){ echo 'selected'; } ?>>Feca M</option>
                            <option data-img-src="images/compte/HupperF.jpg" value="HupperF.jpg" <?php if($compte['fond'] == "HupperF.jpg"){ echo 'selected'; } ?>>Huppermage F</option>
                            <option data-img-src="images/compte/HupperM.jpg" value="HupperM.jpg" <?php if($compte['fond'] == "HupperM.jpg"){ echo 'selected'; } ?>>Huppermage M</option>
                            <option data-img-src="images/compte/IopF.jpg" value="IopF.jpg" <?php if($compte['fond'] == "IopF.jpg"){ echo 'selected'; } ?>>Iop F</option>
                            <option data-img-src="images/compte/IopM.jpg" value="IopM.jpg" <?php if($compte['fond'] == "IopM.jpg"){ echo 'selected'; } ?>>Iop M</option>
                            <option data-img-src="images/compte/OsamodaF.jpg" value="OsamodaF.jpg" <?php if($compte['fond'] == "OsamodaF.jpg"){ echo 'selected'; } ?>>Osamoda F</option>
                            <option data-img-src="images/compte/OsamodaM.jpg" value="OsamodaM.jpg" <?php if($compte['fond'] == "OsamodaM.jpg"){ echo 'selected'; } ?>>Osamoda M</option>
                            <option data-img-src="images/compte/OugiF.jpg" value="OugiF.jpg" <?php if($compte['fond'] == "OugiF.jpg"){ echo 'selected'; } ?>>Ouginak F</option>
                            <option data-img-src="images/compte/OugiM.jpg" value="OugiM.jpg" <?php if($compte['fond'] == "OugiM.jpg"){ echo 'selected'; } ?>>Ouginak M</option>
                            <option data-img-src="images/compte/PandaF.jpg" value="PandaF.jpg" <?php if($compte['fond'] == "PandaF.jpg"){ echo 'selected'; } ?>>Pandawa F</option>
                            <option data-img-src="images/compte/PandaM.jpg" value="PandaM.jpg" <?php if($compte['fond'] == "PandaM.jpg"){ echo 'selected'; } ?>>Pandawa M</option>
                            <option data-img-src="images/compte/RoublardF.jpg" value="RoublardF.jpg" <?php if($compte['fond'] == "RoublardF.jpg"){ echo 'selected'; } ?>>Roublard F</option>
                            <option data-img-src="images/compte/RoublardM.jpg" value="RoublardM.jpg" <?php if($compte['fond'] == "RoublardM.jpg"){ echo 'selected'; } ?>>Roublard M</option>
                            <option data-img-src="images/compte/SacriF.jpg" value="SacriF.jpg" <?php if($compte['fond'] == "SacriF.jpg"){ echo 'selected'; } ?>>Sacrieur F</option>
                            <option data-img-src="images/compte/SacriM.jpg" value="SacriM.jpg" <?php if($compte['fond'] == "SacriM.jpg"){ echo 'selected'; } ?>>Sacrieur M</option>
                            <option data-img-src="images/compte/SadidaF.jpg" value="SadidaF.jpg" <?php if($compte['fond'] == "SadidaF.jpg"){ echo 'selected'; } ?>>Sadida F</option>
                            <option data-img-src="images/compte/SadidaM.jpg" value="SadidaM.jpg" <?php if($compte['fond'] == "SadidaM.jpg"){ echo 'selected'; } ?>>Sadida M</option>
                            <option data-img-src="images/compte/SramF.jpg" value="SramF.jpg" <?php if($compte['fond'] == "SramF.jpg"){ echo 'selected'; } ?>>Sram F</option>
                            <option data-img-src="images/compte/SramM.jpg" value="SramM.jpg" <?php if($compte['fond'] == "SramM.jpg"){ echo 'selected'; } ?>>Sram M</option>
                            <option data-img-src="images/compte/SteamerF.jpg" value="SteamerF.jpg" <?php if($compte['fond'] == "SteamerF.jpg"){ echo 'selected'; } ?>>Steamer F</option>
                            <option data-img-src="images/compte/SteamerM.jpg" value="SteamerM.jpg" <?php if($compte['fond'] == "SteamerM.jpg"){ echo 'selected'; } ?>>SteamerF M</option>
                            <option data-img-src="images/compte/XelorF.jpg" value="XelorF.jpg" <?php if($compte['fond'] == "XelorF.jpg"){ echo 'selected'; } ?>>Xelor F</option>
                            <option data-img-src="images/compte/XelorM.jpg" value="XelorM.jpg" <?php if($compte['fond'] == "XelorM.jpg"){ echo 'selected'; } ?>>Xelor M</option>
                            <option data-img-src="images/compte/ZobalF.jpg" value="ZobalF.jpg" <?php if($compte['fond'] == "ZobalF.jpg"){ echo 'selected'; } ?>>Zobal F</option>
                            <option data-img-src="images/compte/ZobalM.jpg" value="ZobalM.jpg" <?php if($compte['fond'] == "ZobalM.jpg"){ echo 'selected'; } ?>>Zobal M</option>
                        </select>
                        <br><br><br>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifiez !</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModifMDP" tabindex="-1" role="dialog" aria-labelledby="ModifMDPTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModifMDPTitle">Modifier son mot de passe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <label>Mot de passe : 
                            <input type="password" name="mdp">
                        </label>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifiez !</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="ModifPhoto" tabindex="-1" role="dialog" aria-labelledby="ModifPhoto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModifPhotoTitle">Modifier son logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <input id="photo" name="photo" type="file">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifiez !</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
    <!-- FOOTER -->
    <?php include('footer.php'); ?>
    <!-- FOOTER -->

<script>
    $("#choixFond").chosen();
</script>

</body>
</html>