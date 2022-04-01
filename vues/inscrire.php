<form action="index.php?action=validerInscription" method = "post">

    <h2>Réservation du cours n° <?php echo $numero;?></h2>

    <input type="hidden" value="<?php echo $numero;?>" name="numero">

    Nom* : <input type="text" name="nom" placeholder = "Entrez votre nom" required> <br> <br>
    Prénom* : <input type="text" name="prenom" placeholder = "Entrez votre prénom" required> <br><br>
    Adresse* : <input type="text" name="adresse" placeholder = "Entrez votre adresse" required> <br><br>
    Mail* : <input type="text" name="mail" placeholder = "Entrez votre mail" required> <br><br>
    <input type="submit" name = "save" value="S'inscrire">

</form>