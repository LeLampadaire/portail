<!DOCTYPE html>
<html>
    <?php include 'configuration.php' ?>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="images/favicon.ico" />
        <title><?php echo "$NomSite"; ?> - Contact</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    </head>

<body>
    <!-- HEADER -->
    <?php include('header.html'); ?>
    <!-- HEADER -->

    <div class="formMilieu PoliceColorContact">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border text-left font-weight-bold">Formulaire de contact</legend>
        <form class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="option">Catégories :</label>
                <select id="option" name="option" class="input-xlarge">
                    <option>Problème technique</option>
                    <option>Questions/Améliorations</option>
                    <option>Plaintes</option>
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
                <textarea id="message" name="message" style="width: 450px; height: 100px;"></textarea>
            </div>

            <div class="control-group">
                <label class="control-label" for="filebutton">Pièces jointes :</label>
                <input id="filebutton" name="filebutton" class="input-file" type="file">
            </div>

            <div class="control-group text-right">
                <label class="control-label" for="buttonenvoyer"></label>
                <button id="buttonenvoyer" name="buttonenvoyer" class="btn btn-success">Envoyez !</button>
            </div>
        </form>
        </fieldset>
    </div>

    <!-- FOOTER -->
    <?php include('footer.html'); ?>
    <!-- FOOTER -->
</body>
</html>
