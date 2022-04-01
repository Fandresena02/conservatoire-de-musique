<center><h1>Voici la liste des inscriptions</h1><hr><br><br>
<table border>
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
 
    foreach($lesInscriptions as $uneInscriptions)
    {
        ?>

        <tr>
            <td><?php echo $uneInscriptions['nomAd']," ", $uneInscriptions['prenomAd'];?></td>
            <td><?php echo $uneInscriptions['date'];?></td>
            <td><?php echo $uneInscriptions['place'];?></td>
            <td><?php echo $uneInscriptions['nomProf']," ", $uneInscriptions['prenomProf'];?></td>
            <td><?php echo $uneInscriptions['instru'];?></td>
           
        </tr>
        <?php
    }
?>
</table>
</center>

