<?php session_start();


    $idPseudo = $_SESSION['idprofil'];

    if($idPseudo != 1){
        header('Location: index.php');
    }

    require_once 'configuration.php';
    require_once 'dbb_connexion.php';

    $mail = mysqli_query($bdd, 'SELECT * FROM contact ORDER BY id DESC;');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="images/favicon.ico" />
        <title><?php echo $NomSite; ?> - Mail</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="jquery/chosen.css">
	    <link rel="stylesheet" href="jquery/ImageSelect.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>

<body>
    <!-- HEADER -->
    <?php include('header.php'); ?>
    <!-- HEADER -->

    <br>
    
    <div class="container">
        <h1 class="display-3 text-center text-white-position Forte">Messages</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Pseudo</th> 
                    <th scope="col">Email</th>
                    <th scope="col">Catégories</th>
                    <th scope="col">Messsages</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($mail as $donnees){
                    echo '<tr><td>'.utf8_encode($donnees['pseudo']).'</td>';
                    echo '<td>'.utf8_encode($donnees['email']).'</td>';
                    echo '<td>'.utf8_encode($donnees['choix']).'</td>';
                    echo '<td>'.utf8_encode($donnees['message']).'</td></tr>';
                } ?>  
            </tbody>
        </table>
    </div>
      
    <!-- FOOTER -->
    <?php 
        include('footer.php'); 
        mysqli_close($bdd);
    ?>
</body>
</html>