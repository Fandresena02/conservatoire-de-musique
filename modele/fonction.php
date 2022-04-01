<?php


function getCours()
{
    include 'db_connect.php';
    
    $req = "select * from cours 
    inner join professeur on cours.idProfesseur = professeur.id
    inner join personnes on personnes.id = professeur.id
    inner join instrument on instrument.id = cours.idInstrument";
    $res = $dbh -> query($req);
    $data = $res -> fetchAll(PDO::FETCH_ASSOC );
    
    return ($data);
}
?>