<?php


function getCours()
{
    include 'db_connect.php';
    
    $req = "select * from cours";
    $res = $dbh -> query($req);
    $data = $res -> fetch(PDO::FETCH_ASSOC);
    
    var_dump($data);
}