<?php
/**
 * Author : Christopher Pardo
 * Project : Test ICT-151
 * Date : 06.02.2020
 */

require_once ".const.php";

function getAllItems($table)
{

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

function getFilmMakerByName ($name)
{
    require ".const.php";
    try {
        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
        $query = "SELECT * FROM filmmakers WHERE name='$name'";
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetch();//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

?>