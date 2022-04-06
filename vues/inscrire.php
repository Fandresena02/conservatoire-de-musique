<form action="index.php?action=validerInscription" method = "post">

<header class="style1">

    <h2>Réservation du cours n° <?php echo $numero;?></h2>

</header>
    <input type="hidden" value="<?php echo $numero;?>" name="numero">

    Nom* : <input type="text" name="nom" placeholder = "Entrez le nom" required> <br> <br>
    Prénom* : <input type="text" name="prenom" placeholder = "Entrez le prénom" required> <br><br>
    Tel* : <input type="text" name="tel" placeholder = "Entrez le n° tel" required> <br><br>
    Adresse* : <input type="text" name="adresse" placeholder = "Entrez le adresse" required> <br><br>
    Mail* : <input type="email" name="mail" placeholder = "Entrez le mail" required> <br><br>
    <input type="submit" name = "save" value="S'inscrire">

</form>