<?php
/*
  Author : Christopher Pardo
  Project : 
  Date : 13.02.2020
*/

require_once "../index.php";
require_once "../.const.php";

$cmd = "mysql -u $user -p$pass < ../Restore-MCU-PO-Final.sql";
exec($cmd);

// Test unitaire de la fonction getAllItems
/*$items = getAllItems("heroes");
var_dump($items);*/

// Test unitaire de la fonction getAItem
/*$items = getAnItem("filmmakers", "4");
echo "Cette acteur s'appelle ".$items['firstname']." ".$items['lastname'];*/

echo "Test unitaire de la fonction updateFilmMaker : ";
$item = getFilmMakerByName('Chamblon');
$id = $item['id']; // se souvenir de l'id pour comparer
$item['firstname'] = 'Gérard';
$item['lastname'] = 'Menfain';
updateFilmMaker($item);
$readback = getAnItem("filmmakers", $id);
if (($readback['firstname'] == 'Gérard') && ($readback['lastname'] == 'Menfain'))
{
    echo 'OK !!!';
}
else
{
    echo '### BUG ###';
}
echo "\n";

