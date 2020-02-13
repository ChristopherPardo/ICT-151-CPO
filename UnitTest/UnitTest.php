<?php
/*
  Author : Christopher Pardo
  Project : 
  Date : 13.02.2020
*/

require_once "../index.php";


// Test unitaire de la fonction getAllItems
/*$items = getAllItems("heroes");
var_dump($items);*/

// Test unitaire de la fonction getAItem
$items = getAnItem("filmmakers", "4");
//var_dump($items);
echo "Cette acteur s'appelle ".$items['firstname']." ".$items['lastname'];

