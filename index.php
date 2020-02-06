<?php
/**
  Author : Christopher Pardo
  Project : Test ICT-151
  Date : 06.02.2020
*/

$user = "phpApplication";
$pass = 'Pa$$w0rd';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=MCU', $user, $pass);
    foreach($dbh->query('SELECT * from actors') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>