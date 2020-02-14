<?php
/**
 * Author : Christopher Pardo
 * Project : Test ICT-151
 * Date : 06.02.2020
 */

function getPDO()
{
    require ".const.php";
    return new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
}

function getAllItems($table)
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM ' . $table;
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
        $dbh = getPDO();
        $query = 'SELECT * FROM ' . $table . ' WHERE id = ' . $id;
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

function getFilmMakerByName($name)
{
    try {
        $dbh = getPDO();
        $query = "SELECT * FROM filmmakers WHERE lastname = '$name'";
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateFilmMaker($filmMaker)
{
    foreach (array_keys($filmMaker) as $fieldName) {
        if ($fieldName != "id") {
            $fields[] = "$fieldName=:$fieldName";
        }
    }

    try {
        $dbh = getPDO();
        $query = "UPDATE filmMakers SET " . implode(", ", $fields) . " WHERE id=:id";
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute($filmMaker);//execute query
        $queryResult = $statement->fetch();//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}


?>