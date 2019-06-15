<?php session_start();

    $IdPseudo = 1;
    $Pseudo = "Lampadaire";

    require_once 'configuration.php';
    require_once 'dbb_connexion.php';

    $error = -1;

    if(!empty($_POST)){
        $test = mysqli_query($bdd, 'INSERT INTO contact(id, pseudo, email, message, choix) VALUES(NULL, "'.utf8_decode($_POST['pseudo']).'", "'.utf8_decode($_POST['mail']).'", "'.utf8_decode($_POST['message']).'", "'.utf8_decode($_POST['choix']).'"); ');
        
        if($test){
            $error = 1;
        }else{
            $error = 0;
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" />
    <title><?php echo $NomSite; ?> - Contact</title>
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

    <div class="formMilieu PoliceColorContact">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border text-left font-weight-bold">Formulaire de contact</legend>
            <?php
                if ($error == 0) {
                    echo "<div class='alert alert-danger' role='alert'>Erreur dans l'envoi.</div>";
                }else if($error == 1){
                    echo "<div class='alert alert-success' role='alert'>Envoi avec succès !</div>";
                }
            ?>
            <form class="form-horizontal" action="" method="POST">
                <div class="control-group">
                    <label class="control-label" for="option">Catégories :</label>
                    <select id="option" name="choix" class="input-xlarge">
                        <option value="Problème technique">Problème technique</option>
                        <option value="Questions/Améliorations">Questions/Améliorations</option>
                        <option value="Plaintes">Plaintes</option>
                    </select>
                </div>

                <div class="control-group">
                    <label class="input-text" for="pseudo">Votre pseudo :</label>
                    <input id="pseudo" name="pseudo" type="text" placeholder="Pseudo" class="input-xlarge" required>
                </div>

                <div class="control-group">
                    <label class="control-label" for="mail">Adresse mail :</label>
                    <input id="mail" name="mail" type="email" placeholder="xxxxxx@yyyy.cc" class="input-xlarge" required>
                </div>

                <div class="control-group">
                    <label class="control-label" for="message">Votre message :</label>     
                    <textarea id="message" name="message" style="width: 450px; height: 100px;" required></textarea>
                </div>

                <div class="control-group text-right">
                    <label class="control-label" for="buttonenvoyer"></label>
                    <button id="buttonenvoyer" name="buttonenvoyer" class="btn btn-success">Envoyez !</button>
                </div>
            </form>
        </fieldset>
    </div>

    <!-- FOOTER -->
    <?php include('footer.php'); ?>
    <!-- FOOTER -->
</body>
</html>
