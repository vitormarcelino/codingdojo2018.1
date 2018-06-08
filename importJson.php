<?php
require_once 'bootstrap.php';
$animais = json_decode(file_get_contents('dados.json'), true);

foreach ($animais as $animal) {
    $valores = implode("', '", $animal);
    $sql = 'INSERT INTO adoteumpet (nome, foto, especie, raca, cor, idade, sexo, cadastrado) VALUES('.$valores .');';
    echo $sql . PHP_EOL;
}


