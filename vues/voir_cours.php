<center><h1>Voici la liste des cours</h1><hr><br><br>
<table border>
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
            <td><?php echo $list_Cours['jourHeure'];?></td>
            <td><?php echo $list_Cours['nbPlace'];?></td>
            <td><?php echo $list_Cours['nom']," ", $list_Cours['prenom'];?></td>
            <td><?php echo $list_Cours['nomInstru'];?></td>
            <td><a href="index.php?action=inscrire&numero=<?php echo $list_Cours['id'];?>">S'inscrire</a></td>
        </tr>
        <?php
    }
?>
</table>
</center>