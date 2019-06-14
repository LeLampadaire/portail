<!DOCTYPE html>
<html>
    <?php include 'configuration.php' ?>
    <?php require 'dbb_connexion.php' ?>

    <?php 
    
        $portail = $bdd->query("SELECT id, portail, positionX, positionY, utilisation, modificateur, id_membre, temps FROM nidas ORDER BY id DESC");
        $donnees_portail = $portail->fetch();
        $membres = $bdd->query("SELECT id, pseudo FROM membres");

    ?>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="images/favicon.ico" />
        <title><?php echo "$NomSite"; ?> - Portail</title>
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
    <?php include('header.html'); ?>
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
                        if($donnees_portail['modificateur'] == "SB"){
                            echo "<img src='images/Modificateur/Saute_Bouftou.png' alt='SB'></img>";
                        }
                    ?></p>
                    <p class="text-center espace10pxBot"><?php echo "[" . $donnees_portail['positionX'] .",". $donnees_portail['positionY'] . "]" ; ?></p>
                    <p class="text-center espace10pxBot"><?php echo "Posté a " . $donnees_portail['temps'] ?></p>
                </div>

                <div class="col-lg-3">
                    <p class="milieu text-center espace10pxBot">
                    <?php 
                        while($donnees_membre = $membres->fetch()){
                            if($donnees_portail['id_membre'] == $donnees_membre['id']){
                                echo $donnees_membre['pseudo'];
                            }
                        }
                    ?>
                    </p><br><br><br><br>
                    <button type="button" class="btn btn-success EcartPosRep">Confirmer la position</button>
                    <button type="button" class="btn btn-danger">Report !</button>
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group text-center positonMilieu">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">[</span>
                                    <input type="text" aria-label="PosX" class="form-control">
                                    <span class="input-group-text">,</span>
                                    <input type="text" aria-label="PosY" class="form-control">
                                    <span class="input-group-text">]</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group text-center positonMilieu">
                                <input type="text" aria-label="Nombre" class="form-control">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">restantes</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="sectionTaille">
                                <select id="choixModificateurEnutrosor">
                                    <option selected="selected" data-img-src="images/Modificateur/Puissance_cyclique.png" value="PC">Puissance Cyclique</option>
                                    <option data-img-src="images/Modificateur/Liaison_longue_portee.png" value="LLP">Liaison longue portee</option>
                                    <option data-img-src="images/Modificateur/Poussees_revigorantes.png" value="PR">Poussées Revigorantes</option>
                                    <option data-img-src="images/Modificateur/Disparitions_detonantes.png" value="DD">Disparitions Détonantes</option>
                                    <option data-img-src="images/Modificateur/Invocations_incapacitantes.png" value="II">Invocations Incapacitantes</option>
                                    <option data-img-src="images/Modificateur/Deplacements_incapacitants.png" value="DI">Déplacements incapacitants</option>
                                    <option data-img-src="images/Modificateur/Distance_Mesuree.png" value="DM">Distance mesurée</option>
                                    <option data-img-src="images/Modificateur/Entraves_blessantes.png" value="EB">Entraves blessantes</option>
                                    <option data-img-src="images/Modificateur/Solidaires.png" value="S">Solidaires</option>
                                    <option data-img-src="images/Modificateur/Solitude_revigorante.png" value="SR">Solitude revigorante</option>
                                </select>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 btn-group BTNmilieu">
                            <button type="button" class="btn btn-success">Validez la position !</button>
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
                                            <button type="button" class="btn btn-primary">Je suis sûr !</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                          <p class="milieu text-center espace10pxBot">POSITION</p>
                          <p class="milieu text-center espace10pxBot">TEMPS</p>
                      </div>
      
                      <div class="col-lg-3">
                          <p class="milieu text-center espace10pxBot">PROPRIETAIRE</p><br><br><br><br>
                          <button type="button" class="btn btn-success EcartPosRep">Confirmer la position</button>
                          <button type="button" class="btn btn-danger">Report !</button>
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
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="input-group text-center positonMilieu">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">[</span>
                                          <input type="text" aria-label="PosX" class="form-control">
                                          <span class="input-group-text">,</span>
                                          <input type="text" aria-label="PosY" class="form-control">
                                          <span class="input-group-text">]</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="input-group text-center positonMilieu">
                                      <input type="text" aria-label="Nombre" class="form-control">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">restantes</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
      
                          <div class="row">
                              <div class="col-lg-12">
                                  <section class="sectionTaille">
                                          <select id="choixModificateurSrambad">
                                                <option selected="selected" data-img-src="images/Modificateur/Puissance_cyclique.png" value="PC">Puissance Cyclique</option>
                                                <option data-img-src="images/Modificateur/Liaison_longue_portee.png" value="LLP">Liaison longue portee</option>
                                                <option data-img-src="images/Modificateur/Poussees_revigorantes.png" value="PR">Poussées Revigorantes</option>
                                                <option data-img-src="images/Modificateur/Disparitions_detonantes.png" value="DD">Disparitions Détonantes</option>
                                                <option data-img-src="images/Modificateur/Invocations_incapacitantes.png" value="II">Invocations Incapacitantes</option>
                                                <option data-img-src="images/Modificateur/Berserker.png" value="B">Berserker</option>
                                                <option data-img-src="images/Modificateur/Coups_Bas.png" value="CB">Coups bas</option>
                                                <option data-img-src="images/Modificateur/Evasion.png" value="E">Evasion</option>
                                                <option data-img-src="images/Modificateur/Jeux_Dangeureux.png" value="JD">Jeux dangereux</option>
                                                <option data-img-src="images/Modificateur/Larcin.png" value="L">Larcin</option>
                                          </select>
                                  </section>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6 btn-group BTNmilieu">
                                  <button type="button" class="btn btn-success">Validez la position !</button>
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
                                                    <button type="button" class="btn btn-primary">Je suis sûr !</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                          </div>
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
                          <p class="milieu text-center espace10pxBot">POSITION</p>
                          <p class="milieu text-center espace10pxBot">TEMPS</p>
                      </div>
      
                      <div class="col-lg-3">
                          <p class="milieu text-center espace10pxBot">PROPRIETAIRE</p><br><br><br><br>
                          <button type="button" class="btn btn-success EcartPosRep">Confirmer la position</button>
                          <button type="button" class="btn btn-danger">Report !</button>
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
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="input-group text-center positonMilieu">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">[</span>
                                          <input type="text" aria-label="PosX" class="form-control">
                                          <span class="input-group-text">,</span>
                                          <input type="text" aria-label="PosY" class="form-control">
                                          <span class="input-group-text">]</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="input-group text-center positonMilieu">
                                      <input type="text" aria-label="Nombre" class="form-control">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">restantes</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
      
                          <div class="row">
                              <div class="col-lg-12">
                                  <section class="sectionTaille">
                                          <select id="choixModificateurXelorium">
                                                <option selected="selected" data-img-src="images/Modificateur/Puissance_cyclique.png" value="PC">Puissance Cyclique</option>
                                                <option data-img-src="images/Modificateur/Liaison_longue_portee.png" value="LLP">Liaison longue portee</option>
                                                <option data-img-src="images/Modificateur/Poussees_revigorantes.png" value="PR">Poussées Revigorantes</option>
                                                <option data-img-src="images/Modificateur/Disparitions_detonantes.png" value="DD">Disparitions Détonantes</option>
                                                <option data-img-src="images/Modificateur/Invocations_incapacitantes.png" value="II">Invocations Incapacitantes</option>
                                                <option data-img-src="images/Modificateur/Actions_entravees.png" value="AE">Actions entravées</option>
                                                <option data-img-src="images/Modificateur/En_quete_d_action.png" value="QA">En quête d'action</option>
                                                <option data-img-src="images/Modificateur/Retour_Arriere.png" value="RA">Retour arrière</option>
                                                <option data-img-src="images/Modificateur/Saute_Bouftou.png" value="SB">Saute-Bouftou</option>
                                                <option data-img-src="images/Modificateur/Solitude_momifiante.png" value="SM">Solitude momifiante</option>
                                          </select>
                                  </section>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6 btn-group BTNmilieu">
                                  <button type="button" class="btn btn-success">Validez la position !</button>
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
                                                    <button type="button" class="btn btn-primary">Je suis sûr !</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                          </div>
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
                          <p class="milieu text-center espace10pxBot">POSITION</p>
                          <p class="milieu text-center espace10pxBot">TEMPS</p>
                      </div>
      
                      <div class="col-lg-3">
                          <p class="milieu text-center espace10pxBot">PROPRIETAIRE</p><br><br><br><br>
                          <button type="button" class="btn btn-success EcartPosRep">Confirmer la position</button>
                          <button type="button" class="btn btn-danger">Report !</button>
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
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="input-group text-center positonMilieu">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">[</span>
                                          <input type="text" aria-label="PosX" class="form-control">
                                          <span class="input-group-text">,</span>
                                          <input type="text" aria-label="PosY" class="form-control">
                                          <span class="input-group-text">]</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="input-group text-center positonMilieu">
                                      <input type="text" aria-label="Nombre" class="form-control">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">restantes</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
      
                          <div class="row">
                              <div class="col-lg-12">
                                  <section class="sectionTaille">
                                          <select id="choixModificateurEcaflipus">
                                                <option selected="selected" data-img-src="images/Modificateur/Puissance_cyclique.png" value="PC">Puissance Cyclique</option>
                                                <option data-img-src="images/Modificateur/Liaison_longue_portee.png" value="LLP">Liaison longue portee</option>
                                                <option data-img-src="images/Modificateur/Poussees_revigorantes.png" value="PR">Poussées Revigorantes</option>
                                                <option data-img-src="images/Modificateur/Disparitions_detonantes.png" value="DD">Disparitions Détonantes</option>
                                                <option data-img-src="images/Modificateur/Invocations_incapacitantes.png" value="II">Invocations Incapacitantes</option>
                                                <option data-img-src="images/Modificateur/Régeneration_Critique.png" value="RC">Régénération Critique</option>
                                                <option data-img-src="images/Modificateur/Roulette_Elementaire.png" value="RE">Roulette Élementaire</option>
                                                <option data-img-src="images/Modificateur/Case_Bonus.png" value="CB">Case Bonus</option>
                                                <option data-img-src="images/Modificateur/Cible_Prioritaire.png" value="CP">Cible prioritaire</option>
                                                <option data-img-src="images/Modificateur/Bonne_distance.png" value="BD">Bonne distance</option>
                                          </select>
                                  </section>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6 btn-group BTNmilieu">
                                  <button type="button" class="btn btn-success">Validez la position !</button>
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
                                                    <button type="button" class="btn btn-primary">Je suis sûr !</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
      
    <!-- FOOTER -->
    <?php include('footer.html'); ?>
    <!-- FOOTER -->

    <script>
        $("#choixModificateurEnutrosor").chosen();
        $("#choixModificateurSrambad").chosen();
        $("#choixModificateurXelorium").chosen();
        $("#choixModificateurEcaflipus").chosen();
    </script>

</body>
</html>