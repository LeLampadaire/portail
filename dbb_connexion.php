<?php 

    $bdd = mysqli_connect("localhost", "root", "", "portail");

    if(!$bdd){
        echo "<div class='container'><div class='alert alert-danger' role='alert'>";
        echo "Erreur connexion SQL !";
        echo "</div></div>";
    }

?>