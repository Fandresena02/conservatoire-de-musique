<header class="style1">
	<h2>Connexion</h2>
</header><br>

<div class="container">
    <div class="row">
	    <div class="col-2 col-12-medium"></div>
            <div class="col-8 col-12-medium">
                <div style="padding: 8%; margin-bottom: 10%; box-shadow: 55px 36px 18px grey; border-radius: 10px; background-color: #E7E7E7">
                <form action="index.php?action=validerConnexion" method = "POST">

                    Identifiant :
                        <input type="text" name ="login" placeholder = "Entrez votre identifiant" required> <br>
                    Mot de passe : 
                        <input type="password" name ="mdp" placeholder = "Entrez votre mot de passe" required> <br><br>
                        <center> <input type="submit" name = "seconnecter" value="Se connecter"></center>


                </form>
                </div>
            </div>
    </div>
</div>