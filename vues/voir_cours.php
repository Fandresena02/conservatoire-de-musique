<header class="style1">
							<h2>Voici la liste des cours</h2>
							<p>
								Le conservatoire fait pour vous pour monter en compétence
							</p>
</header><hr>

<table class="default">
    <thead>
               <tr>
                   <td>Jour/H</td>
                   <td>Places</td>
                   <td>Professeur</td>
                   <td>Instrument</td>
                   <td>inscriptions</td>
               </tr>
    </thead>
    
    
<?php
 
    foreach($lesCours as $list_Cours)
    {
        ?>

        <tr>
            <center>
                <td><?php echo $list_Cours['jourHeure'];?></td>
                <td><?php echo $list_Cours['nbPlace'];?></td>
                <td><?php echo $list_Cours['nom']," ", $list_Cours['prenom'];?></td>
                <td><?php echo $list_Cours['nomInstru'];?></td>
                <td><a href="index.php?action=inscrire&numero=<?php echo $list_Cours['id'];?>">
                <img src="../images/inscription.png" alt="S'inscrire" style="width : 100px; height : 35px;"></a></td>
            </center>
        </tr>
        <?php
    }
?>
</table>