<?php
/**
 * Author : Christopher Pardo
 * Project : Test ICT-151
 * Date : 06.02.2020
 */

function getAllItems($table)
{
    require ".const.php";

    try {
        $dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $user, $pass);
        $query = 'SELECT * FROM '.$table;
        $statment = $dbh->prepare($query); //Prepare query
        $statment->execute(); //Execute query
        $queryResult = $statment->fetchAll(); //Prepare result for client
        return $queryResult;
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getAnItem($table, $id)
{
    require ".const.php";

    try {
        $dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $user, $pass);
        $query = 'SELECT * FROM '.$table.' WHERE id = '.$id;
        $statment = $dbh->prepare($query); //Prepare query
        $statment->execute(); //Execute query
        $queryResult = $statment->fetch(); //Prepare result for client
        return $queryResult;
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

// Test unitaire de la fonction getAllItems
/*$items = getAllItems("heroes");
var_dump($items);*/

// Test unitaire de la fonction getAItem
$items = getAnItem("filmmakers", "4");
//var_dump($items);
echo "Cette acteur s'appelle ".$items['firstname']." ".$items['lastname'];



?>