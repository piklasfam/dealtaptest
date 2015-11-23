<?php
include('animalClass.php');
$animals = new Animal();

$goat = new Goat(0,10000,100);
$goatSerials = $goat->setSerialNumbers(0,10000,100);
$goat->SaveToFile('goat.txt', json_encode($goatSerials));

$sheep = new Sheep(0,10000,100);
$sheepSerials = $sheep->setSerialNumbers(0,10000,100);
$sheep->SaveToFile('sheep.txt', json_encode($sheepSerials));

$compareSerials = array_intersect($goatSerials, $sheepSerials);
$animals->SaveToFile('soulmates.txt', json_encode($compareSerials));

$data = array('goat' => $goatSerials, 'sheep' => $sheepSerials, 'soulmates' => $compareSerials);
echo json_encode($data);
?>
