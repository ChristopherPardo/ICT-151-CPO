<?php
/**
  Author : Christopher Pardo ...
  Project : 
  Date : 13.02.2020
*/

require_once "../crud.php";
require_once "../.const.php";

$cmd = "mysql -u $user -p$pass < ../Restore-MCU-PO-Final.sql";
exec($cmd);


echo "Test unitaire de la fonction getAllItems : ";
$items = getAllItems("filmmakers");
if (count($items) == 4)
{
    echo 'OK !!!';
}
else
{
    echo 'BUG !!!';
}
echo "\n";
echo "Test unitaire de la fonction getItem : ";
$item = getAnItem("filmmakers",3);
if ($item['lastname'] == 'Chamblon')
{
    echo 'OK !!!';
}
else
{
    echo 'BUG !!!';
}
echo "\n";

echo "Test unitaire de la fonction getFilmMakerName : ";
$item = getFilmMakerByName('Chamblon');
if ($item['id'] == 3)
{
    echo 'OK !!!';
}
else
{
    echo '### BUG ###';
}
echo "\n";

echo "Test unitaire de la fonction updateFilmMaker : ";
$item = getFilmMakerByName('Chamblon');
$id = $item['id']; // se souvenir de l'id pour comparer
$item['firstname'] = 'Gérard';
$item['lastname'] = 'Menfain';
updateFilmMaker($item);
$readback = getAnItem("filmmakers",$id);
if (($readback['firstname'] == 'Gérard') && ($readback['lastname'] == 'Menfain'))
{
    echo 'OK !!!';
}
else
{
    echo '### BUG ###';
}
echo "\n";

echo "Test unitaire de la fonction deleteFilMaker : ";

deleteFilmMaker(4);

$item = getAnItem("filmMakers", 4);

if ($item == NULL){
    echo 'OK !!!';
}
else{
    echo '### BUG ###';
}

