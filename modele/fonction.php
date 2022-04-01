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

function validerInscription($tableau)
{
    include 'db_connect.php';
    $req1 = "insert into personnes (nom, prenom, tel, adresse, mail)
     values ('$tableau[0]', '$tableau[1]', '$tableau[2]', '$tableau[3]', '$tableau[4]')";
    $res1 = $dbh -> query($req1);

    $req2 = "select id from personnes where nom = '$tableau[0]' and prenom = '$tableau[1]' and tel = '$tableau[2]'";
    $res2 = $dbh -> query($req2);
    $data2 = $res2 -> fetch(PDO::FETCH_ASSOC );
    $number = $data2['id'];

    $req3 = "insert into adherent (id) values ('$number')";
    $res3 = $dbh -> query($req3);

    $req4 = "insert into inscription (idAdherent, idCours) values ('$number', '$tableau[5]')";
    $res4 = $dbh -> query($req4);

    $res6 = "update cours set nbPlace = nbPlace - 1";
    $req6 = $dbh -> query ($res6);


}

function getInscription()
{
    include 'db_connect.php';

    $req5 = "select pers.nom as nomAd, pers.prenom as prenomAd, c.jourHeure as date, c.nbPlace as place, pers1.nom as nomProf, pers1.prenom as prenomProf, i.nomInstru as instru
    from inscription ins
    inner join adherent as a on a.id = ins.idAdherent
    inner join cours as c on c.id = ins.idCours
    inner join professeur as prof on prof.id = c.idProfesseur
    inner join personnes as pers on pers.id = a.id
    inner join personnes as pers1 on pers1.id = prof.id
    inner join instrument as i on i.id = c.idInstrument";

    $res5 = $dbh -> query($req5);
    $data3 = $res5 -> fetchAll(PDO::FETCH_ASSOC );
    
    return ($data3);
}
?>