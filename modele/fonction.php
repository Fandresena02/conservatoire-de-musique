<?php

function getCours()
{
    include 'db_connect.php';
    
    $req = "select c.id, c.jourHeure, c.nbPlace, pers.nom, pers.prenom, i.nomInstru from cours as c
    inner join professeur as p on p.id = c.idProfesseur
    inner join personnes as pers on pers.id = p.id
    inner join instrument as i on i.id = c.idInstrument";
    $res = $dbh -> prepare($req);
    $res -> execute();
    $data = $res -> fetchAll(PDO::FETCH_ASSOC);
    
    return ($data);
}

function validerInscription($tableau)
{
    

    include 'db_connect.php';

    $req1 = "insert into personnes (nom, prenom, tel, adresse, mail) values (?, ?, ?, ?, ?)";
    $res1 = $dbh -> prepare($req1);
    $res1 -> bindParam(1, $tableau[0]);
    $res1 -> bindParam(2, $tableau[1]);
    $res1 -> bindParam(3, $tableau[2]);
    $res1 -> bindParam(4, $tableau[3]);
    $res1 -> bindParam(5, $tableau[4]);
    /*$res1 -> execute(array($tableau[0], $tableau[1], $tableau[2], $tableau[3], $tableau[4]));*/
    $res1 -> execute(); 

    $erreur = $res1 -> errorInfo();

    if ($erreur[0] != 45000)
    {

        $req2 = "select id from personnes where nom = ? and prenom = ? and tel = ?";
        $res2 = $dbh -> prepare($req2);
        $res2 -> bindParam(1, $tableau[0]);
        $res2 -> bindParam(2, $tableau[1]);
        $res2 -> bindParam(3, $tableau[2]);
        $res2 -> execute();
        $data2 = $res2 -> fetch(PDO::FETCH_ASSOC );
        $number = $data2['id'];

        $req3 = "insert into adherent (id) values (?)";
        $res3 = $dbh -> prepare($req3);
        $res3 -> bindParam(1, $number);
        $res3 -> execute();

        $req4 = "insert into inscription (idAdherent, idCours) values (?, ?)";
        $res4 = $dbh -> prepare($req4);
        $res4 -> bindParam(1, $number);
        $res4 -> bindParam(2, $tableau[5]);
        $res4 -> execute();

        $req6 = "update cours set nbPlace = nbPlace - 1 where id = ?";
        $res6 = $dbh -> prepare($req6);
        $res6 -> bindParam(1, $tableau[5]);
        $res6 -> execute();

    }else {
        throw (new Exception($erreur[2]));
        }



}

function getInscription()
{
    include 'db_connect.php';

    $req5 = "select pers.nom as nomAd, pers.prenom as prenomAd, c.jourHeure as date, 
    c.nbPlace as place, pers1.nom as nomProf, pers1.prenom as prenomProf, i.nomInstru as instru,
    ins.idAdherent as idAd, ins.idCours as idC
    from inscription ins
    inner join adherent as a on a.id = ins.idAdherent
    inner join cours as c on c.id = ins.idCours
    inner join professeur as prof on prof.id = c.idProfesseur
    inner join personnes as pers on pers.id = a.id
    inner join personnes as pers1 on pers1.id = prof.id
    inner join instrument as i on i.id = c.idInstrument";

    $res5 = $dbh -> prepare($req5);
    $res5 -> execute();
    $data3 = $res5 -> fetchAll(PDO::FETCH_ASSOC);
    /*var_dump($data3);*/
    return ($data3);
}

function supprimerInscription($num)
{
    include 'db_connect.php';
    $lesInscrits = getInscription();
    $req7 = "delete from inscription where idAdherent = ? and idCours = ?";
    $res7 = $dbh -> prepare($req7);
    $res7 -> bindParam(1, $lesInscrits[$num]['idAd']);
    $res7 -> bindParam(2, $lesInscrits[$num]['idC']);
    $res7 -> execute();

    $req8 = "update cours set nbPlace = nbPlace + 1 where id = ?";
    $res8 = $dbh -> prepare($req8);
    $res8 -> bindParam(1, $lesInscrits[$num]['idC']);
    $res8 -> execute();
}

function seConnecter($login, $mdp)
{
    include 'db_connect.php';
    $req9 = "select id, count(*) as nb from user where login = ? and mdp =?";
    $res9 = $dbh -> prepare($req9);
    $res9 -> bindParam(1,$login);
    $res9 -> bindParam(2,$mdp);
    $res9 -> execute();
    $data4 = $res9-> fetch(PDO::FETCH_ASSOC);
    /*$nb = $data4['nb'];

    if ($nb > 0)
    {
        return "true";
    }else {
        return "false";
    }*/
    return($data4);
}

function connect($id)
{
    $_SESSION["id"] = $id;
}

function deconnexion()
{
    session_destroy();
    

}

function getAdherent()
{
    include 'db_connect.php';
    $req10 = "select p.nom as nomAdherent, p.prenom as prenomAdherent, p.id as idAdherent from adherent as a 
    inner join personnes as p on a.id = p.id";
    $res10 = $dbh -> prepare($req10);
    $res10 -> execute();
    $list = $res10 -> fetchAll(PDO::FETCH_ASSOC);

    return ($list);
}

?>