<?php session_start();

    if(empty($_SESSION)){
        $session = 0;
        $IdPseudo = NULL;
        $Pseudo = NULL;
    }else{
        $IdPseudo = $_SESSION['idprofil'];
        $Pseudo = $_SESSION['pseudo'];
        $session = 1;
    }

    require_once 'configuration.php';
    require_once 'dbb_connexion.php';

    if($IdPseudo != NULL){
        if(!empty($_POST['confirmation-enutrosor'])){
            mysqli_query($bdd, 'UPDATE membres SET validation_totale = validation_totale+1 WHERE id='.$_POST['id_membre'].';');
            mysqli_query($bdd, 'INSERT INTO atcham_cpt(id, id_pos, id_membre, validation) VALUES(NULL, '.$_POST['confirmation-enutrosor'].', '.$IdPseudo.', 1);');
        }else if(!empty($_POST['report-enutrosor'])){
            mysqli_query($bdd, 'UPDATE membres SET report_totale = report_totale+1 WHERE id='.$_POST['id_membre'].';');
            mysqli_query($bdd, 'INSERT INTO atcham_cpt(id, id_pos, id_membre, validation) VALUES(NULL, '.$_POST['report-enutrosor'].', '.$IdPseudo.', 0);');
        }else if(!empty($_POST['valid-enutrosor'])){
            if($_POST['utilisation-enutrosor'] == 0){
                mysqli_query($bdd, 'UPDATE atcham SET utilisation='.$_POST['utilisation-enutrosor'].', positionX=NULL, positionY=NULL, modificateur=NULL, id_membre='.$IdPseudo.' WHERE id='.$_POST['valid-enutrosor'].';');
            }else{
                $recup = mysqli_query($bdd, 'SELECT positionX, positionY FROM atcham WHERE id='.$_POST['valid-enutrosor'].';');
                $recup = mysqli_fetch_array($recup, MYSQLI_ASSOC);
                if($_POST['positionY-enutrosor'] == $recup['positionY'] AND $_POST['positionX-enutrosor'] == $recup['positionX']){
                    mysqli_query($bdd, 'UPDATE atcham SET utilisation='.$_POST['utilisation-enutrosor'].', modificateur="'.$_POST['modificateur-enutrosor'].'" WHERE id='.$_POST['valid-enutrosor'].';');
                    if($_POST['modificateur-enutrosor'] == "NULL"){
                        mysqli_query($bdd, 'UPDATE atcham SET modificateur=NULL WHERE id='.$_POST['valid-enutrosor'].';');
                    }
                }else{
                    mysqli_query($bdd, 'INSERT INTO atcham (id, portail, positionX, positionY, utilisation, modificateur, id_membre, temps) VALUES (NULL, "enutrosor", '.$_POST['positionX-enutrosor'].', '.$_POST['positionY-enutrosor'].', '.$_POST['utilisation-enutrosor'].', "'.$_POST['modificateur-enutrosor'].'", '.$IdPseudo.', CURRENT_TIMESTAMP());');
                    if($_POST['modificateur-enutrosor'] == "NULL"){
                        $tid = mysqli_query($bdd, 'SELECT id FROM atcham WHERE id=(SELECT MAX(id) FROM atcham) AND portail="enutrosor";');
                        $tid = mysqli_fetch_array($tid, MYSQLI_ASSOC);
                        mysqli_query($bdd, 'UPDATE atcham SET modificateur=NULL WHERE id='.$tid['id'].';');
                    }
                }
            }
        }else if(!empty($_POST['inconnu-enutrosor'])){
            mysqli_query($bdd, 'UPDATE atcham SET utilisation=0, positionX=NULL, positionY=NULL, modificateur=NULL, id_membre='.$IdPseudo.' WHERE id='.$_POST['inconnu-enutrosor'].';');
        }else if(!empty($_POST['confirmation-srambad'])){
            mysqli_query($bdd, 'UPDATE membres SET validation_totale = validation_totale+1 WHERE id='.$_POST['id_membre'].';');
            mysqli_query($bdd, 'INSERT INTO atcham_cpt(id, id_pos, id_membre, validation) VALUES(NULL, '.$_POST['confirmation-srambad'].', '.$IdPseudo.', 1);');
        }else if(!empty($_POST['report-srambad'])){
            mysqli_query($bdd, 'UPDATE membres SET report_totale = report_totale+1 WHERE id='.$_POST['id_membre'].';');
            mysqli_query($bdd, 'INSERT INTO atcham_cpt(id, id_pos, id_membre, validation) VALUES(NULL, '.$_POST['report-srambad'].', '.$IdPseudo.', 0);');
        }else if(!empty($_POST['valid-srambad'])){
            if($_POST['utilisation-srambad'] == 0){
                mysqli_query($bdd, 'UPDATE atcham SET utilisation='.$_POST['utilisation-srambad'].', positionX=NULL, positionY=NULL, modificateur=NULL, id_membre='.$IdPseudo.' WHERE id='.$_POST['valid-srambad'].';');
            }else{
                $recup = mysqli_query($bdd, 'SELECT positionX, positionY FROM atcham WHERE id='.$_POST['valid-srambad'].';');
                $recup = mysqli_fetch_array($recup, MYSQLI_ASSOC);
                if($_POST['positionY-srambad'] == $recup['positionY'] AND $_POST['positionX-srambad'] == $recup['positionX']){
                    mysqli_query($bdd, 'UPDATE atcham SET utilisation='.$_POST['utilisation-srambad'].', modificateur="'.$_POST['modificateur-srambad'].'" WHERE id='.$_POST['valid-srambad'].';');
                    if($_POST['modificateur-srambad'] == "NULL"){
                        mysqli_query($bdd, 'UPDATE atcham SET modificateur=NULL WHERE id='.$_POST['valid-srambad'].';');
                    }
                }else{
                    mysqli_query($bdd, 'INSERT INTO atcham (id, portail, positionX, positionY, utilisation, modificateur, id_membre, temps) VALUES (NULL, "srambad", '.$_POST['positionX-srambad'].', '.$_POST['positionY-srambad'].', '.$_POST['utilisation-srambad'].', "'.$_POST['modificateur-srambad'].'", '.$IdPseudo.', CURRENT_TIMESTAMP());');
                    if($_POST['modificateur-srambad'] == "NULL"){
                        $tid = mysqli_query($bdd, 'SELECT id FROM atcham WHERE id=(SELECT MAX(id) FROM atcham) AND portail="srambad";');
                        $tid = mysqli_fetch_array($tid, MYSQLI_ASSOC);
                        mysqli_query($bdd, 'UPDATE atcham SET modificateur=NULL WHERE id='.$tid['id'].';');
                    }
                }
            }
        }else if(!empty($_POST['inconnu-srambad'])){
            mysqli_query($bdd, 'UPDATE atcham SET utilisation=0, positionX=NULL, positionY=NULL, modificateur=NULL, id_membre='.$IdPseudo.' WHERE id='.$_POST['inconnu-srambad'].';');
        }else if(!empty($_POST['confirmation-xelorium'])){
            mysqli_query($bdd, 'UPDATE membres SET validation_totale = validation_totale+1 WHERE id='.$_POST['id_membre'].';');
            mysqli_query($bdd, 'INSERT INTO atcham_cpt(id, id_pos, id_membre, validation) VALUES(NULL, '.$_POST['confirmation-xelorium'].', '.$IdPseudo.', 1);');
        }else if(!empty($_POST['report-xelorium'])){
            mysqli_query($bdd, 'UPDATE membres SET report_totale = report_totale+1 WHERE id='.$_POST['id_membre'].';');
            mysqli_query($bdd, 'INSERT INTO atcham_cpt(id, id_pos, id_membre, validation) VALUES(NULL, '.$_POST['report-xelorium'].', '.$IdPseudo.', 0);');
        }else if(!empty($_POST['valid-xelorium'])){
            if($_POST['utilisation-xelorium'] == 0){
                mysqli_query($bdd, 'UPDATE atcham SET utilisation='.$_POST['utilisation-xelorium'].', positionX=NULL, positionY=NULL, modificateur=NULL, id_membre='.$IdPseudo.' WHERE id='.$_POST['valid-xelorium'].';');
            }else{
                $recup = mysqli_query($bdd, 'SELECT positionX, positionY FROM atcham WHERE id='.$_POST['valid-xelorium'].';');
                $recup = mysqli_fetch_array($recup, MYSQLI_ASSOC);
                if($_POST['positionY-xelorium'] == $recup['positionY'] AND $_POST['positionX-xelorium'] == $recup['positionX']){
                    mysqli_query($bdd, 'UPDATE atcham SET utilisation='.$_POST['utilisation-xelorium'].', modificateur="'.$_POST['modificateur-xelorium'].'" WHERE id='.$_POST['valid-xelorium'].';');
                    if($_POST['modificateur-xelorium'] == "NULL"){
                        mysqli_query($bdd, 'UPDATE atcham SET modificateur=NULL WHERE id='.$_POST['valid-xelorium'].';');
                    }
                }else{
                    mysqli_query($bdd, 'INSERT INTO atcham (id, portail, positionX, positionY, utilisation, modificateur, id_membre, temps) VALUES (NULL, "xelorium", '.$_POST['positionX-xelorium'].', '.$_POST['positionY-xelorium'].', '.$_POST['utilisation-xelorium'].', "'.$_POST['modificateur-xelorium'].'", '.$IdPseudo.', CURRENT_TIMESTAMP());');
                    if($_POST['modificateur-xelorium'] == "NULL"){
                        $tid = mysqli_query($bdd, 'SELECT id FROM atcham WHERE id=(SELECT MAX(id) FROM atcham) AND portail="xelorium";');
                        $tid = mysqli_fetch_array($tid, MYSQLI_ASSOC);
                        mysqli_query($bdd, 'UPDATE atcham SET modificateur=NULL WHERE id='.$tid['id'].';');
                    }
                }
            }
        }else if(!empty($_POST['inconnu-xelorium'])){
            mysqli_query($bdd, 'UPDATE atcham SET utilisation=0, positionX=NULL, positionY=NULL, modificateur=NULL, id_membre='.$IdPseudo.' WHERE id='.$_POST['inconnu-xelorium'].';');
        }else if(!empty($_POST['confirmation-ecaflipus'])){
            mysqli_query($bdd, 'UPDATE membres SET validation_totale = validation_totale+1 WHERE id='.$_POST['id_membre'].';');
            mysqli_query($bdd, 'INSERT INTO atcham_cpt(id, id_pos, id_membre, validation) VALUES(NULL, '.$_POST['confirmation-ecaflipus'].', '.$IdPseudo.', 1);');
        }else if(!empty($_POST['report-ecaflipus'])){
            mysqli_query($bdd, 'UPDATE membres SET report_totale = report_totale+1 WHERE id='.$_POST['id_membre'].';');
            mysqli_query($bdd, 'INSERT INTO atcham_cpt(id, id_pos, id_membre, validation) VALUES(NULL, '.$_POST['report-ecaflipus'].', '.$IdPseudo.', 0);');
        }else if(!empty($_POST['valid-ecaflipus'])){
            if($_POST['utilisation-ecaflipus'] == 0){
                mysqli_query($bdd, 'UPDATE atcham SET utilisation='.$_POST['utilisation-ecaflipus'].', positionX=NULL, positionY=NULL, modificateur=NULL, id_membre='.$IdPseudo.' WHERE id='.$_POST['valid-ecaflipus'].';');
            }else{
                $recup = mysqli_query($bdd, 'SELECT positionX, positionY FROM atcham WHERE id='.$_POST['valid-ecaflipus'].';');
                $recup = mysqli_fetch_array($recup, MYSQLI_ASSOC);
                if($_POST['positionY-ecaflipus'] == $recup['positionY'] AND $_POST['positionX-ecaflipus'] == $recup['positionX']){
                    mysqli_query($bdd, 'UPDATE atcham SET utilisation='.$_POST['utilisation-ecaflipus'].', modificateur="'.$_POST['modificateur-ecaflipus'].'" WHERE id='.$_POST['valid-ecaflipus'].';');
                    if($_POST['modificateur-ecaflipus'] == "NULL"){
                        mysqli_query($bdd, 'UPDATE atcham SET modificateur=NULL WHERE id='.$_POST['valid-ecaflipus'].';');
                    }
                }else{
                    mysqli_query($bdd, 'INSERT INTO atcham (id, portail, positionX, positionY, utilisation, modificateur, id_membre, temps) VALUES (NULL, "ecaflipus", '.$_POST['positionX-ecaflipus'].', '.$_POST['positionY-ecaflipus'].', '.$_POST['utilisation-ecaflipus'].', "'.$_POST['modificateur-ecaflipus'].'", '.$IdPseudo.', CURRENT_TIMESTAMP());');
                    if($_POST['modificateur-ecaflipus'] == "NULL"){
                        $tid = mysqli_query($bdd, 'SELECT id FROM atcham WHERE id=(SELECT MAX(id) FROM atcham) AND portail="ecaflipus";');
                        $tid = mysqli_fetch_array($tid, MYSQLI_ASSOC);
                        mysqli_query($bdd, 'UPDATE atcham SET modificateur=NULL WHERE id='.$tid['id'].';');
                    }
                }
            }
        }else if(!empty($_POST['inconnu-ecaflipus'])){
            mysqli_query($bdd, 'UPDATE atcham SET utilisation=0, positionX=NULL, positionY=NULL, modificateur=NULL, id_membre='.$IdPseudo.' WHERE id='.$_POST['inconnu-ecaflipus'].';');
        }
    }

    function modificateur($modif){
        if($modif == "PC"){
            $return = "<img src='images/Modificateur/Puissance_cyclique.png' alt='PC'></img>";
        }else if($modif == "LLP"){
            $return = "<img src='images/Modificateur/Liaison_longue_portee.png' alt='LLP'></img>";
        }else if($modif == "PR"){
            $return = "<img src='images/Modificateur/Poussees_revigorantes.png' alt='PR'></img>";
        }else if($modif == "DD"){
            $return = "<img src='images/Modificateur/Disparitions_detonantes.png' alt='DD'></img>";
        }else if($modif == "II"){
            $return = "<img src='images/Modificateur/Invocations_incapacitantes.png' alt='II'></img>";
        }else if($modif == "DI"){
            $return = "<img src='images/Modificateur/Deplacements_incapacitants.png' alt='DI'></img>";
        }else if($modif == "DM"){
            $return = "<img src='images/Modificateur/Distance_Mesuree.png' alt='DM'></img>";
        }else if($modif == "EB"){
            $return = "<img src='images/Modificateur/Entraves_blessantes.png' alt='EB'></img>";
        }else if($modif == "S"){
            $return = "<img src='images/Modificateur/Solidaires.png' alt='S'></img>";
        }else if($modif == "SR"){
            $return = "<img src='images/Modificateur/Solitude_revigorante.png' alt='SR'></img>";
        }else if($modif == "B"){
            $return = "<img src='images/Modificateur/Berserker.png' alt='B'></img>";
        }else if($modif == "COB"){
            $return = "<img src='images/Modificateur/Coups_Bas.png' alt='COB'></img>";
        }else if($modif == "E"){
            $return = "<img src='images/Modificateur/Evasion.png' alt='E'></img>";
        }else if($modif == "JD"){
            $return = "<img src='images/Modificateur/Jeux_Dangeureux.png' alt='JD'></img>";
        }else if($modif == "L"){
            $return = "<img src='images/Modificateur/Larcin.png' alt='L'></img>";
        }else if($modif == "AE"){
            $return = "<img src='images/Modificateur/Actions_entravees.png' alt='AE'></img>";
        }else if($modif == "QA"){
            $return = "<img src='images/Modificateur/En_quete_d_action.png' alt='QA'></img>";
        }else if($modif == "RA"){
            $return = "<img src='images/Modificateur/Retour_Arriere.png' alt='RA'></img>";
        }else if($modif == "SB"){
            $return = "<img src='images/Modificateur/Saute_Bouftou.png' alt='SB'></img>";
        }else if($modif == "SM"){
            $return = "<img src='images/Modificateur/Solitude_momifiante.png' alt='SM'></img>";
        }else if($modif == "RC"){
            $return = "<img src='images/Modificateur/Régeneration_Critique.png' alt='RC'></img>";
        }else if($modif == "RE"){
            $return = "<img src='images/Modificateur/Roulette_Elementaire.png' alt='RE'></img>";
        }else if($modif == "CB"){
            $return = "<img src='images/Modificateur/Case_Bonus.png' alt='CB'></img>";
        }else if($modif == "CP"){
            $return = "<img src='images/Modificateur/Cible_Prioritaire.png' alt='CP'></img>";
        }else if($modif == "BD"){
            $return = "<img src='images/Modificateur/Bonne_distance.png' alt='BD'></img>";
        }else if($modif == NULL){
            $return = "<img src='images/Modificateur/inconnu.png' alt='inconnu'></img>";
        }
        echo $return;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="images/favicon.ico" />
        <title><?php echo $NomSite; ?> - Portail</title>
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
    </head>

<body>
    <!-- HEADER -->
    <?php include('header.php'); ?>
    <!-- HEADER -->
    
    <div class="container">
        <h1 class="display-3 text-center text-white-position Forte">Position des portails</h1>
        <p class="lead text-center">C'est un simple site pour afficher la position des portails grâce aux utilisateurs.</p>
        <hr class="my-4 hrSolid">
        <div class="alert alert-danger text-center" role="alert">Merci de ne pas mettre des positions inutiles ou corompues sous peine de ban.</div>
        <div class="text-right">
            <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#ModalCenter">Plus ...</button>
        </div>
        <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenterTitle">Informations sur la page des portails </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Merci de ne pas rentrer de fausses informations inutiles pour les autres joueurs.</li>
                            <li>N'oubliez pas de valider la position des autres joueurs.</li>
                            <li>Le site peut toujours avoir des mises à jour.</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay !</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- Enutrosor -->

    <div class="container text-center border border-warning border-radius margin-bottom" style="background-image: url(images/fondPortail.jpg);">
      <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2">
                    <h3 class="espace10px text-warning">Enutrosor</h3>
                    <img src="images/portail-enutrosor.png" alt="Enutrosor" width="100px" height="150px">
                </div>
                <div class="col-lg-2">
                <h4>Actuellement :</h4>
                    <p class="text-center espace10pxBot">
                    <?php 
                        $enutrosor = mysqli_query($bdd, 'SELECT atcham.id as id_atcham, pseudo, positionX, positionY, utilisation, modificateur, id_membre, TIMESTAMPDIFF(MINUTE,temps,NOW()) as temps FROM atcham INNER JOIN membres ON(atcham.id_membre = membres.id) WHERE portail="enutrosor" ORDER BY atcham.id DESC');
                        $enutrosor = mysqli_fetch_array($enutrosor, MYSQLI_ASSOC);

                        $temps = strftime("%Hh et %Mm", $enutrosor['temps'] * 60 );
                        if($enutrosor['temps']*1 >= 1440 && $enutrosor['temps']*1 < 2880){
                            $temps = "plus d'un jour.";
                        }else if($enutrosor['temps']*1 >= 2880){
                            $temps = "plus de 2 jours.";
                        }
                    ?></p>
                    <?php if($enutrosor['utilisation'] != 0){ ?>
                        <?php modificateur($enutrosor['modificateur']); ?>
                        <p class="text-center espace10pxBot"><?php echo "[" . $enutrosor['positionX'] .",". $enutrosor['positionY'] . "]" ; ?></p>
                        <p class="text-center espace10pxBot"><?php echo $enutrosor['utilisation']." utilisations" ?></p>
                        <p class="text-center espace10pxBot"><?php echo "Il y a ".$temps; ?></p>
                    <?php }else{ ?>
                        <br><br><br><p class="text-center espace10pxBot">INCONNU</p>
                    <?php } ?>
                    
                </div>

                <div class="col-lg-3">
                    <?php 
                        if($enutrosor['id_atcham'] != NULL){
                            $test_valid = mysqli_query($bdd, 'SELECT COUNT(validation) as nbr FROM atcham_cpt WHERE id_pos='.$enutrosor['id_atcham'].' AND validation=1;');
                            $test_valid = mysqli_fetch_array($test_valid, MYSQLI_ASSOC);
                            $test_report = mysqli_query($bdd, 'SELECT COUNT(validation) as nbr FROM atcham_cpt WHERE id_pos='.$enutrosor['id_atcham'].' AND validation=0;');
                            $test_report = mysqli_fetch_array($test_report, MYSQLI_ASSOC);
                            $disabled = 0;
                        }else{
                            $test_valid['validation'] = 0;
                            $test_report['report'] = 0;
                            $disabled = 1;
                        }
                    ?>
                    <p class="milieu text-center"><?php echo $enutrosor['pseudo']; ?></p>
                    <button class="btn btn-outline-success"><?php if(!$disabled){ echo $test_valid['nbr']; }else{ echo '0'; } ?></button>
                    <button class="btn btn-outline-danger"><?php if(!$disabled){ echo $test_report['nbr']; }else{ echo '0'; } ?></button>
                    <br><br><br><br><br>
                    <?php if($session == 1){
                        if($enutrosor['id_atcham'] != NULL){
                            $droit = mysqli_query($bdd, 'SELECT * FROM atcham_cpt WHERE id_pos='.$enutrosor['id_atcham'].' AND id_membre='.$IdPseudo.';');
                            $droit = mysqli_fetch_array($droit, MYSQLI_ASSOC);
                        }else{
                            $droit = 1;
                        }
                        
                        if(!$droit){ ?>
                            <form action="" method="POST">
                                <input type="hidden" value="<?php echo $enutrosor['id_membre']; ?>" name="id_membre">
                                <button type="submit" class="btn btn-success EcartPosRep" name="confirmation-enutrosor" value="<?php echo $enutrosor['id_atcham']; ?>" <?php if($disabled){ echo 'disabled'; } ?>>Confirmer la position</button>
                                <button type="submit" class="btn btn-danger" name="report-enutrosor" value="<?php echo $enutrosor['id_atcham']; ?>" <?php if($disabled){ echo 'disabled'; } ?>>Report !</button>
                            </form><br>
                        <?php } 
                    } ?>
                </div>

                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-6 text-left positonMilieu">
                            <span class="input-group-text">Position :</span>
                        </div>
                        <div class="col-lg-6 text-left positonMilieu">
                            <span class="input-group-text">Nombres d'utilisations :</span>
                        </div>
                    </div>
                        
                    <form action="" method="POST">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group text-center positonMilieu">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">[</span>
                                        <input type="text" aria-label="PosX" value="<?php echo $enutrosor['positionX']; ?>" class="form-control" name="positionX-enutrosor" required>
                                        <span class="input-group-text">,</span>
                                        <input type="text" aria-label="PosY" value="<?php echo $enutrosor['positionY']; ?>" class="form-control" name="positionY-enutrosor" required>
                                        <span class="input-group-text">]</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group text-center positonMilieu">
                                    <input type="number" aria-label="Nombre" class="form-control" min="0" max="124" value="<?php if($enutrosor['utilisation'] != 0){ echo $enutrosor['utilisation']; } ?>" name="utilisation-enutrosor" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">restantes</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <section class="sectionTaille">
                                        <select id="choixModificateurEnutrosor" name="modificateur-enutrosor">
                                            <option data-img-src="images/Modificateur/Puissance_cyclique.png" value="PC" <?php if($enutrosor['modificateur'] == "SP"){ echo 'selected'; } ?>>Puissance Cyclique</option>
                                            <option data-img-src="images/Modificateur/Liaison_longue_portee.png" value="LLP" <?php if($enutrosor['modificateur'] == "LLP"){ echo 'selected'; } ?>>Liaison longue portee</option>
                                            <option data-img-src="images/Modificateur/Poussees_revigorantes.png" value="PR" <?php if($enutrosor['modificateur'] == "PR"){ echo 'selected'; } ?>>Poussées Revigorantes</option>
                                            <option data-img-src="images/Modificateur/Disparitions_detonantes.png" value="DD" <?php if($enutrosor['modificateur'] == "DD"){ echo 'selected'; } ?>>Disparitions Détonantes</option>
                                            <option data-img-src="images/Modificateur/Invocations_incapacitantes.png" value="II" <?php if($enutrosor['modificateur'] == "II"){ echo 'selected'; } ?>>Invocations Incapacitantes</option>
                                            <option data-img-src="images/Modificateur/Berserker.png" value="B" <?php if($enutrosor['modificateur'] == "B"){ echo 'selected'; } ?>>Berserker</option>
                                            <option data-img-src="images/Modificateur/Coups_Bas.png" value="COB" <?php if($enutrosor['modificateur'] == "COB"){ echo 'selected'; } ?>>Coups bas</option>
                                            <option data-img-src="images/Modificateur/Evasion.png" value="E" <?php if($enutrosor['modificateur'] == "E"){ echo 'selected'; } ?>>Evasion</option>
                                            <option data-img-src="images/Modificateur/Jeux_Dangeureux.png" value="JD" <?php if($enutrosor['modificateur'] == "JD"){ echo 'selected'; } ?>>Jeux dangereux</option>
                                            <option data-img-src="images/Modificateur/Larcin.png" value="L" <?php if($enutrosor['modificateur'] == "L"){ echo 'selected'; } ?>>Larcin</option>
                                            <option data-img-src="images/Modificateur/inconnu.png" value="NULL" <?php if($enutrosor['modificateur'] == NULL){ echo 'selected'; } ?>>Inconnu</option>
                                        </select>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 btn-group BTNmilieu">
                                <button type="submit" class="btn btn-success" name="valid-enutrosor" value="<?php if($enutrosor['id_atcham'] != NULL){ echo $enutrosor['id_atcham']; }else{ echo '-1'; }?>" <?php if($session == 0){ echo 'disabled'; } ?>>Validez la position !</button>
                            </div>
                            <div class="col-lg-6 btn-group BTNmilieu">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PositionInconnueEnutrosor">Position inconnue !</button>

                                <div class="modal fade" id="PositionInconnueEnutrosor" tabindex="-1" role="dialog" aria-labelledby="PositionInconnueEnutrosorTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="PositionInconnueEnutrosorTitle">Position inconnue</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr que le portail "Enutrosor" n'existe plus ?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="" method="POST">
                                                    <button type="submit" class="btn btn-primary" name="inconnu-enutrosor" value="<?php echo $enutrosor['id_atcham']; ?>" <?php if($session == 0){ echo 'disabled'; } ?>>Je suis sûr !</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- Srambad -->

    <div class="container text-center border border-primary border-radius margin-bottom" style="background-image: url(images/fondPortail.jpg);">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-2">
                        <h3 class="espace10px text-primary">Srambad</h3>
                        <img src="images/portail-srambad.png" alt="Srambad" width="100px" height="150px">
                    </div>
                    <div class="col-lg-2">
                    <h4>Actuellement :</h4>
                        <p class="text-center espace10pxBot">
                        <?php 
                            $srambad = mysqli_query($bdd, 'SELECT atcham.id as id_atcham, pseudo, positionX, positionY, utilisation, modificateur, id_membre, TIMESTAMPDIFF(MINUTE,temps,NOW()) as temps FROM atcham INNER JOIN membres ON(atcham.id_membre = membres.id) WHERE portail="srambad" ORDER BY atcham.id DESC');
                            $srambad = mysqli_fetch_array($srambad, MYSQLI_ASSOC);

                            $temps = strftime("%Hh et %Mm", $srambad['temps'] * 60 );
                            if($srambad['temps']*1 >= 1440 && $srambad['temps']*1 < 2880){
                                $temps = "plus d'un jour.";
                            }else if($srambad['temps']*1 >= 2880){
                                $temps = "plus de 2 jours.";
                            }
                        ?></p>
                        <?php if($srambad['utilisation'] != 0){ ?>
                            <?php modificateur($srambad['modificateur']); ?>
                            <p class="text-center espace10pxBot"><?php echo "[" . $srambad['positionX'] .",". $srambad['positionY'] . "]" ; ?></p>
                            <p class="text-center espace10pxBot"><?php echo $srambad['utilisation']." utilisations" ?></p>
                            <p class="text-center espace10pxBot"><?php echo "Il y a ".$temps; ?></p>
                        <?php }else{ ?>
                            <br><br><br><p class="text-center espace10pxBot">INCONNU</p>
                        <?php } ?>
                        
                    </div>

                    <div class="col-lg-3">
                        <?php 
                            if($srambad['id_atcham'] != NULL){
                                $test_valid = mysqli_query($bdd, 'SELECT COUNT(validation) as nbr FROM atcham_cpt WHERE id_pos='.$srambad['id_atcham'].' AND validation=1;');
                                $test_valid = mysqli_fetch_array($test_valid, MYSQLI_ASSOC);
                                $test_report = mysqli_query($bdd, 'SELECT COUNT(validation) as nbr FROM atcham_cpt WHERE id_pos='.$srambad['id_atcham'].' AND validation=0;');
                                $test_report = mysqli_fetch_array($test_report, MYSQLI_ASSOC);
                                $disabled = 0;
                            }else{
                                $test_valid['validation'] = 0;
                                $test_report['report'] = 0;
                                $disabled = 1;
                            }
                        ?>
                        <p class="milieu text-center"><?php echo $srambad['pseudo']; ?></p>
                        <button class="btn btn-outline-success"><?php if(!$disabled){ echo $test_valid['nbr']; }else{ echo '0'; } ?></button>
                        <button class="btn btn-outline-danger"><?php if(!$disabled){ echo $test_report['nbr']; }else{ echo '0'; } ?></button>
                        <br><br><br><br><br>
                        <?php if($session == 1){
                            if($srambad['id_atcham'] != NULL){
                                $droit = mysqli_query($bdd, 'SELECT * FROM atcham_cpt WHERE id_pos='.$srambad['id_atcham'].' AND id_membre='.$IdPseudo.';');
                                $droit = mysqli_fetch_array($droit, MYSQLI_ASSOC);
                            }else{
                                $droit = 1;
                            }

                            if(!$droit){ ?>
                                <form action="" method="POST">
                                    <input type="hidden" value="<?php echo $srambad['id_membre']; ?>" name="id_membre">
                                    <button type="submit" class="btn btn-success EcartPosRep" name="confirmation-srambad" value="<?php echo $srambad['id_atcham']; ?>" <?php if($disabled){ echo 'disabled'; } ?>>Confirmer la position</button>
                                    <button type="submit" class="btn btn-danger" name="report-srambad" value="<?php echo $srambad['id_atcham']; ?>" <?php if($disabled){ echo 'disabled'; } ?>>Report !</button>
                                </form><br>
                            <?php } 
                        } ?>
                    </div>

                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-6 text-left positonMilieu">
                                <span class="input-group-text">Position :</span>
                            </div>
                            <div class="col-lg-6 text-left positonMilieu">
                                <span class="input-group-text">Nombres d'utilisations :</span>
                            </div>
                        </div>
                            
                        <form action="" method="POST">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group text-center positonMilieu">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">[</span>
                                            <input type="text" aria-label="PosX" value="<?php echo $srambad['positionX']; ?>" class="form-control" name="positionX-srambad" required>
                                            <span class="input-group-text">,</span>
                                            <input type="text" aria-label="PosY" value="<?php echo $srambad['positionY']; ?>" class="form-control" name="positionY-srambad" required>
                                            <span class="input-group-text">]</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group text-center positonMilieu">
                                        <input type="number" aria-label="Nombre" class="form-control" min="0" max="124" value="<?php if($srambad['utilisation'] != 0){ echo $srambad['utilisation']; } ?>" name="utilisation-srambad" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">restantes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="sectionTaille">
                                        <select id="choixModificateurSrambad" name="modificateur-srambad">
                                            <option data-img-src="images/Modificateur/Puissance_cyclique.png" value="PC" <?php if($srambad['modificateur'] == "PC"){ echo 'selected'; } ?>>Puissance Cyclique</option>
                                            <option data-img-src="images/Modificateur/Liaison_longue_portee.png" value="LLP" <?php if($srambad['modificateur'] == "LLP"){ echo 'selected'; } ?>>Liaison longue portee</option>
                                            <option data-img-src="images/Modificateur/Poussees_revigorantes.png" value="PR" <?php if($srambad['modificateur'] == "PR"){ echo 'selected'; } ?>>Poussées Revigorantes</option>
                                            <option data-img-src="images/Modificateur/Disparitions_detonantes.png" value="DD" <?php if($srambad['modificateur'] == "DD"){ echo 'selected'; } ?>>Disparitions Détonantes</option>
                                            <option data-img-src="images/Modificateur/Invocations_incapacitantes.png" value="II" <?php if($srambad['modificateur'] == "II"){ echo 'selected'; } ?>>Invocations Incapacitantes</option>
                                            <option data-img-src="images/Modificateur/Deplacements_incapacitants.png" value="DI" <?php if($srambad['modificateur'] == "DI"){ echo 'selected'; } ?>>Déplacements incapacitants</option>
                                            <option data-img-src="images/Modificateur/Distance_Mesuree.png" value="DM" <?php if($srambad['modificateur'] == "DM"){ echo 'selected'; } ?>>Distance mesurée</option>
                                            <option data-img-src="images/Modificateur/Entraves_blessantes.png" value="EB" <?php if($srambad['modificateur'] == "EB"){ echo 'selected'; } ?>>Entraves blessantes</option>
                                            <option data-img-src="images/Modificateur/Solidaires.png" value="S" <?php if($srambad['modificateur'] == "S"){ echo 'selected'; } ?>>Solidaires</option>
                                            <option data-img-src="images/Modificateur/Solitude_revigorante.png" value="SR" <?php if($srambad['modificateur'] == "SR"){ echo 'selected'; } ?>>Solitude revigorante</option>
                                            <option data-img-src="images/Modificateur/inconnu.png" value="NULL" <?php if($srambad['modificateur'] == NULL){ echo 'selected'; } ?>>Inconnu</option>
                                        </select>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 btn-group BTNmilieu">
                                    <button type="submit" class="btn btn-success" name="valid-srambad" value="<?php if($srambad['id_atcham'] != NULL){ echo $srambad['id_atcham']; }else{ echo '-1'; }?>" <?php if($session == 0){ echo 'disabled'; } ?>>Validez la position !</button>
                                </div>
                                <div class="col-lg-6 btn-group BTNmilieu">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PositionInconnueSrambad">Position inconnue !</button>

                                    <div class="modal fade" id="PositionInconnueSrambad" tabindex="-1" role="dialog" aria-labelledby="PositionInconnueSrambadTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="PositionInconnueSrambadTitle">Position inconnue</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr que le portail "Srambad" n'existe plus ?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="POST">
                                                        <button type="submit" class="btn btn-primary" name="inconnu-srambad" value="<?php echo $srambad['id_atcham']; ?>" <?php if($session == 0){ echo 'disabled'; } ?>>Je suis sûr !</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>      

    <!-- Xelorium -->

    <div class="container text-center border border-success border-radius margin-bottom" style="background-image: url(images/fondPortail.jpg);">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-2">
                        <h3 class="espace10px text-success">Xelorium</h3>
                        <img src="images/portail-xelorium.png" alt="Xelorium" width="100px" height="150px">
                    </div>
                    <div class="col-lg-2">
                    <h4>Actuellement :</h4>
                        <p class="text-center espace10pxBot">
                        <?php 
                            $xelorium = mysqli_query($bdd, 'SELECT atcham.id as id_atcham, pseudo, positionX, positionY, utilisation, modificateur, id_membre, TIMESTAMPDIFF(MINUTE,temps,NOW()) as temps FROM atcham INNER JOIN membres ON(atcham.id_membre = membres.id) WHERE portail="xelorium" ORDER BY atcham.id DESC');
                            $xelorium = mysqli_fetch_array($xelorium, MYSQLI_ASSOC);

                            $temps = strftime("%Hh et %Mm", $xelorium['temps'] * 60 );
                            if($xelorium['temps']*1 >= 1440 && $xelorium['temps']*1 < 2880){
                                $temps = "plus d'un jour.";
                            }else if($xelorium['temps']*1 >= 2880){
                                $temps = "plus de 2 jours.";
                            }
                        ?></p>
                        <?php if($xelorium['utilisation'] != 0){ ?>
                            <?php modificateur($xelorium['modificateur']); ?>
                            <p class="text-center espace10pxBot"><?php echo "[" . $xelorium['positionX'] .",". $xelorium['positionY'] . "]" ; ?></p>
                            <p class="text-center espace10pxBot"><?php echo $xelorium['utilisation']." utilisations" ?></p>
                            <p class="text-center espace10pxBot"><?php echo "Il y a ".$temps; ?></p>
                        <?php }else{ ?>
                            <br><br><br><p class="text-center espace10pxBot">INCONNU</p>
                        <?php } ?>
                        
                    </div>

                    <div class="col-lg-3">
                        <?php 
                            if($xelorium['id_atcham'] != NULL){
                                $test_valid = mysqli_query($bdd, 'SELECT COUNT(validation) as nbr FROM atcham_cpt WHERE id_pos='.$xelorium['id_atcham'].' AND validation=1;');
                                $test_valid = mysqli_fetch_array($test_valid, MYSQLI_ASSOC);
                                $test_report = mysqli_query($bdd, 'SELECT COUNT(validation) as nbr FROM atcham_cpt WHERE id_pos='.$xelorium['id_atcham'].' AND validation=0;');
                                $test_report = mysqli_fetch_array($test_report, MYSQLI_ASSOC);
                                $disabled = 0;
                            }else{
                                $test_valid['validation'] = 0;
                                $test_report['report'] = 0;
                                $disabled = 1;
                            }
                        ?>
                        <p class="milieu text-center"><?php echo $xelorium['pseudo']; ?></p>
                        <button class="btn btn-outline-success"><?php if(!$disabled){ echo $test_valid['nbr']; }else{ echo '0'; } ?></button>
                        <button class="btn btn-outline-danger"><?php if(!$disabled){ echo $test_report['nbr']; }else{ echo '0'; } ?></button>
                        <br><br><br><br><br>
                        <?php if($session == 1){
                            if($xelorium['id_atcham'] != NULL){
                                $droit = mysqli_query($bdd, 'SELECT * FROM atcham_cpt WHERE id_pos='.$xelorium['id_atcham'].' AND id_membre='.$IdPseudo.';');
                                $droit = mysqli_fetch_array($droit, MYSQLI_ASSOC);
                            }else{
                                $droit = 1;
                            }

                            if(!$droit){ ?>
                                <form action="" method="POST">
                                    <input type="hidden" value="<?php echo $xelorium['id_membre']; ?>" name="id_membre">
                                    <button type="submit" class="btn btn-success EcartPosRep" name="confirmation-xelorium" value="<?php echo $xelorium['id_atcham']; ?>" <?php if($disabled){ echo 'disabled'; } ?>>Confirmer la position</button>
                                    <button type="submit" class="btn btn-danger" name="report-xelorium" value="<?php echo $xelorium['id_atcham']; ?>" <?php if($disabled){ echo 'disabled'; } ?>>Report !</button>
                                </form><br>
                            <?php } 
                        } ?>
                    </div>

                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-6 text-left positonMilieu">
                                <span class="input-group-text">Position :</span>
                            </div>
                            <div class="col-lg-6 text-left positonMilieu">
                                <span class="input-group-text">Nombres d'utilisations :</span>
                            </div>
                        </div>
                            
                        <form action="" method="POST">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group text-center positonMilieu">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">[</span>
                                            <input type="text" aria-label="PosX" value="<?php echo $xelorium['positionX']; ?>" class="form-control" name="positionX-xelorium" required>
                                            <span class="input-group-text">,</span>
                                            <input type="text" aria-label="PosY" value="<?php echo $xelorium['positionY']; ?>" class="form-control" name="positionY-xelorium" required>
                                            <span class="input-group-text">]</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group text-center positonMilieu">
                                        <input type="number" aria-label="Nombre" class="form-control" min="0" max="124" value="<?php if($xelorium['utilisation'] != 0){ echo $xelorium['utilisation']; } ?>" name="utilisation-xelorium" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">restantes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="sectionTaille">
                                        <select id="choixModificateurXelorium" name="modificateur-xelorium">
                                                <option data-img-src="images/Modificateur/Puissance_cyclique.png" value="PC" <?php if($xelorium['modificateur'] == "PC"){ echo 'selected'; } ?>>Puissance Cyclique</option>
                                                <option data-img-src="images/Modificateur/Liaison_longue_portee.png" value="LLP" <?php if($xelorium['modificateur'] == "LLP"){ echo 'selected'; } ?>>Liaison longue portee</option>
                                                <option data-img-src="images/Modificateur/Poussees_revigorantes.png" value="PR" <?php if($xelorium['modificateur'] == "PR"){ echo 'selected'; } ?>>Poussées Revigorantes</option>
                                                <option data-img-src="images/Modificateur/Disparitions_detonantes.png" value="DD" <?php if($xelorium['modificateur'] == "DD"){ echo 'selected'; } ?>>Disparitions Détonantes</option>
                                                <option data-img-src="images/Modificateur/Invocations_incapacitantes.png" value="II" <?php if($xelorium['modificateur'] == "II"){ echo 'selected'; } ?>>Invocations Incapacitantes</option>
                                                <option data-img-src="images/Modificateur/Actions_entravees.png" value="AE" <?php if($xelorium['modificateur'] == "AE"){ echo 'selected'; } ?>>Actions entravées</option>
                                                <option data-img-src="images/Modificateur/En_quete_d_action.png" value="QA" <?php if($xelorium['modificateur'] == "QA"){ echo 'selected'; } ?>>En quête d'action</option>
                                                <option data-img-src="images/Modificateur/Retour_Arriere.png" value="RA" <?php if($xelorium['modificateur'] == "RA"){ echo 'selected'; } ?>>Retour arrière</option>
                                                <option data-img-src="images/Modificateur/Saute_Bouftou.png" value="SB" <?php if($xelorium['modificateur'] == "SB"){ echo 'selected'; } ?>>Saute-Bouftou</option>
                                                <option data-img-src="images/Modificateur/Solitude_momifiante.png" value="SM" <?php if($xelorium['modificateur'] == "SM"){ echo 'selected'; } ?>>Solitude momifiante</option>
                                            <option data-img-src="images/Modificateur/inconnu.png" value="NULL" <?php if($xelorium['modificateur'] == NULL){ echo 'selected'; } ?>>Inconnu</option>
                                        </select>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 btn-group BTNmilieu">
                                    <button type="submit" class="btn btn-success" name="valid-xelorium" value="<?php if($xelorium['id_atcham'] != NULL){ echo $xelorium['id_atcham']; }else{ echo '-1'; }?>" <?php if($session == 0){ echo 'disabled'; } ?>>Validez la position !</button>
                                </div>
                                <div class="col-lg-6 btn-group BTNmilieu">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PositionInconnueXelorium">Position inconnue !</button>

                                    <div class="modal fade" id="PositionInconnueXelorium" tabindex="-1" role="dialog" aria-labelledby="PositionInconnueXeloriumTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="PositionInconnueXeloriumTitle">Position inconnue</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr que le portail "Xelorium" n'existe plus ?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="POST">
                                                        <button type="submit" class="btn btn-primary" name="inconnu-xelorium" value="<?php echo $xelorium['id_atcham']; ?>" <?php if($session == 0){ echo 'disabled'; } ?>>Je suis sûr !</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <!-- Ecaflipus -->

    <div class="container text-center border border-danger border-radius margin-bottom" style="background-image: url(images/fondPortail.jpg);">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-2">
                        <h3 class="espace10px text-danger">Ecaflipus</h3>
                        <img src="images/portail-ecaflipus.png" alt="Ecaflipus" width="100px" height="150px">
                    </div>
                    <div class="col-lg-2">
                    <h4>Actuellement :</h4>
                        <p class="text-center espace10pxBot">
                        <?php 
                            $ecaflipus = mysqli_query($bdd, 'SELECT atcham.id as id_atcham, pseudo, positionX, positionY, utilisation, modificateur, id_membre, TIMESTAMPDIFF(MINUTE,temps,NOW()) as temps FROM atcham INNER JOIN membres ON(atcham.id_membre = membres.id) WHERE portail="ecaflipus" ORDER BY atcham.id DESC');
                            $ecaflipus = mysqli_fetch_array($ecaflipus, MYSQLI_ASSOC);

                            $temps = strftime("%Hh et %Mm", $ecaflipus['temps'] * 60 );
                            if($ecaflipus['temps']*1 >= 1440 && $ecaflipus['temps']*1 < 2880){
                                $temps = "plus d'un jour.";
                            }else if($ecaflipus['temps']*1 >= 2880){
                                $temps = "plus de 2 jours.";
                            }
                        ?></p>
                        <?php if($ecaflipus['utilisation'] != 0){ ?>
                            <?php modificateur($ecaflipus['modificateur']); ?>
                            <p class="text-center espace10pxBot"><?php echo "[" . $ecaflipus['positionX'] .",". $ecaflipus['positionY'] . "]" ; ?></p>
                            <p class="text-center espace10pxBot"><?php echo $ecaflipus['utilisation']." utilisations" ?></p>
                            <p class="text-center espace10pxBot"><?php echo "Il y a ".$temps; ?></p>
                        <?php }else{ ?>
                            <br><br><br><p class="text-center espace10pxBot">INCONNU</p>
                        <?php } ?>
                        
                    </div>

                    <div class="col-lg-3">
                        <?php 
                            if($ecaflipus['id_atcham'] != NULL){
                                $test_valid = mysqli_query($bdd, 'SELECT COUNT(validation) as nbr FROM atcham_cpt WHERE id_pos='.$ecaflipus['id_atcham'].' AND validation=1;');
                                $test_valid = mysqli_fetch_array($test_valid, MYSQLI_ASSOC);
                                $test_report = mysqli_query($bdd, 'SELECT COUNT(validation) as nbr FROM atcham_cpt WHERE id_pos='.$ecaflipus['id_atcham'].' AND validation=0;');
                                $test_report = mysqli_fetch_array($test_report, MYSQLI_ASSOC);
                                $disabled = 0;
                            }else{
                                $test_valid['validation'] = 0;
                                $test_report['report'] = 0;
                                $disabled = 1;
                            }
                        ?>
                        <p class="milieu text-center"><?php echo $ecaflipus['pseudo']; ?></p>
                        <button class="btn btn-outline-success"><?php if(!$disabled){ echo $test_valid['nbr']; }else{ echo '0'; } ?></button>
                        <button class="btn btn-outline-danger"><?php if(!$disabled){ echo $test_report['nbr']; }else{ echo '0'; } ?></button>
                        <br><br><br><br><br>
                        <?php if($session == 1){
                            if($ecaflipus['id_atcham'] != NULL){
                                $droit = mysqli_query($bdd, 'SELECT * FROM atcham_cpt WHERE id_pos='.$ecaflipus['id_atcham'].' AND id_membre='.$IdPseudo.';');
                                $droit = mysqli_fetch_array($droit, MYSQLI_ASSOC);
                            }else{
                                $droit = 1;
                            }

                            if(!$droit){ ?>
                                <form action="" method="POST">
                                    <input type="hidden" value="<?php echo $ecaflipus['id_membre']; ?>" name="id_membre">
                                    <button type="submit" class="btn btn-success EcartPosRep" name="confirmation-ecaflipus" value="<?php echo $ecaflipus['id_atcham']; ?>" <?php if($disabled){ echo 'disabled'; } ?>>Confirmer la position</button>
                                    <button type="submit" class="btn btn-danger" name="report-ecaflipus" value="<?php echo $ecaflipus['id_atcham']; ?>" <?php if($disabled){ echo 'disabled'; } ?>>Report !</button>
                                </form><br>
                            <?php } 
                        } ?>
                    </div>

                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-6 text-left positonMilieu">
                                <span class="input-group-text">Position :</span>
                            </div>
                            <div class="col-lg-6 text-left positonMilieu">
                                <span class="input-group-text">Nombres d'utilisations :</span>
                            </div>
                        </div>
                            
                        <form action="" method="POST">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group text-center positonMilieu">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">[</span>
                                            <input type="text" aria-label="PosX" value="<?php echo $ecaflipus['positionX']; ?>" class="form-control" name="positionX-ecaflipus" required>
                                            <span class="input-group-text">,</span>
                                            <input type="text" aria-label="PosY" value="<?php echo $ecaflipus['positionY']; ?>" class="form-control" name="positionY-ecaflipus" required>
                                            <span class="input-group-text">]</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group text-center positonMilieu">
                                        <input type="number" aria-label="Nombre" class="form-control" min="0" max="124" value="<?php if($ecaflipus['utilisation'] != 0){ echo $ecaflipus['utilisation']; } ?>" name="utilisation-ecaflipus" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">restantes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="sectionTaille">
                                        <select id="choixModificateurEcaflipus" name="modificateur-ecaflipus">
                                                <option data-img-src="images/Modificateur/Puissance_cyclique.png" value="PC" <?php if($ecaflipus['modificateur'] == "PC"){ echo 'selected'; } ?>>Puissance Cyclique</option>
                                                <option data-img-src="images/Modificateur/Liaison_longue_portee.png" value="LLP" <?php if($ecaflipus['modificateur'] == "LLP"){ echo 'selected'; } ?>>Liaison longue portee</option>
                                                <option data-img-src="images/Modificateur/Poussees_revigorantes.png" value="PR" <?php if($ecaflipus['modificateur'] == "PR"){ echo 'selected'; } ?>>Poussées Revigorantes</option>
                                                <option data-img-src="images/Modificateur/Disparitions_detonantes.png" value="DD" <?php if($ecaflipus['modificateur'] == "DD"){ echo 'selected'; } ?>>Disparitions Détonantes</option>
                                                <option data-img-src="images/Modificateur/Invocations_incapacitantes.png" value="II" <?php if($ecaflipus['modificateur'] == "II"){ echo 'selected'; } ?>>Invocations Incapacitantes</option>
                                                <option data-img-src="images/Modificateur/Régeneration_Critique.png" value="RC" <?php if($ecaflipus['modificateur'] == "RC"){ echo 'selected'; } ?>>Régénération Critique</option>
                                                <option data-img-src="images/Modificateur/Roulette_Elementaire.png" value="RE" <?php if($ecaflipus['modificateur'] == "RE"){ echo 'selected'; } ?>>Roulette Élementaire</option>
                                                <option data-img-src="images/Modificateur/Case_Bonus.png" value="CB" <?php if($ecaflipus['modificateur'] == "CB"){ echo 'selected'; } ?>>Case Bonus</option>
                                                <option data-img-src="images/Modificateur/Cible_Prioritaire.png" value="CP" <?php if($ecaflipus['modificateur'] == "CP"){ echo 'selected'; } ?>>Cible prioritaire</option>
                                                <option data-img-src="images/Modificateur/Bonne_distance.png" value="BD" <?php if($ecaflipus['modificateur'] == "BD"){ echo 'selected'; } ?>>Bonne distance</option>
                                            <option data-img-src="images/Modificateur/inconnu.png" value="NULL" <?php if($ecaflipus['modificateur'] == NULL){ echo 'selected'; } ?>>Inconnu</option>
                                        </select>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 btn-group BTNmilieu">
                                    <button type="submit" class="btn btn-success" name="valid-ecaflipus" value="<?php if($ecaflipus['id_atcham'] != NULL){ echo $ecaflipus['id_atcham']; }else{ echo '-1'; }?>" <?php if($session == 0){ echo 'disabled'; } ?>>Validez la position !</button>
                                </div>
                                <div class="col-lg-6 btn-group BTNmilieu">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PositionInconnueEcaflipus">Position inconnue !</button>

                                    <div class="modal fade" id="PositionInconnueEcaflipus" tabindex="-1" role="dialog" aria-labelledby="PositionInconnueEcaflipusTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="PositionInconnueEcaflipusTitle">Position inconnue</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr que le portail "Ecaflipus" n'existe plus ?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="POST">
                                                        <button type="submit" class="btn btn-primary" name="inconnu-ecaflipus" value="<?php echo $ecaflipus['id_atcham']; ?>" <?php if($session == 0){ echo 'disabled'; } ?>>Je suis sûr !</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <!-- FOOTER -->
    <?php 
        include('footer.php'); 
        mysqli_close($bdd);
    ?>
    <!-- FOOTER -->

    <script>
        $("#choixModificateurEnutrosor").chosen();
        $("#choixModificateurSrambad").chosen();
        $("#choixModificateurXelorium").chosen();
        $("#choixModificateurEcaflipus").chosen();
    </script>

</body>
</html>