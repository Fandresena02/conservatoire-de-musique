<header class="style1">
	<h2>Voici la liste des inscriptions</h2>
	<p>
		Le conservatoire fait pour vous pour monter en compétence
	</p>
</header><hr>

<table class="default">
    <thead>
               <tr>
                   <td>Adhérent</td>
                   <td>Jours/heures</td>
                   <td>Nb place</td>
                   <td>Professeur</td>
                   <td>Instrument</td>
                   <td>Pdf</td>
                   <td>Suppression</td>
               </tr>
    </thead>
    
<?php
    $i = 0;
        foreach($lesInscriptions as $uneInscriptions)
        {
            ?>

            <tr>
               
                <td><?php echo $uneInscriptions['nomAd']," ", $uneInscriptions['prenomAd'];?></td>
                <td><?php echo $uneInscriptions['date'];?></td>
                <td><?php echo $uneInscriptions['place'];?></td>
                <td><?php echo $uneInscriptions['nomProf']," ", $uneInscriptions['prenomProf'];?></td>
                <td><?php echo $uneInscriptions['instru'];?></td>
                <td><a href="index.php?action=voirPdf&numeroInscription=<?php echo $i;?>">
                    <img src="../images/pdf.png" alt="Voir pdf" style="width : 25px; height : 30px;"></a></td>
                <td><a href="index.php?action=supprimer&numeroInscription=<?php echo $i;?>">
                    <img src="../images/supp.png" alt="supprimer" style="width : 30px; height : 30px;"></a></td>
                
            </tr>
            <?php

            $i++;
        }
?>

</table>


