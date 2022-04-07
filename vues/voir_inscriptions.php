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
            <td><?php echo $i;?></td>
           
        </tr>
        <?php
    $i++;
    }
?>

</table>


