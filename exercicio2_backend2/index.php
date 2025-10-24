<?php

require_once __DIR__ . '/vendor/autoload.php';

use Daoo\Aula02\Pessoa;
use Daoo\Aula02\Atleta;

try {
    $pessoa = new Pessoa("Vinícius", 22, 75, 1.78, "Programador");
    $atleta = new Atleta("Renata Ingrata", 28, 60, 1.70, "Atleta", "Corrida");

    echo $pessoa . "<br>";
    echo $pessoa->trabalhar() . "<br>";
    echo "IMC: " . number_format($pessoa->calcularIMC(), 2) . "<br><br>";

    echo $atleta . "<br>";
    echo $atleta->trabalhar() . "<br>";
    echo "IMC: " . number_format($atleta->calcularIMC(), 2);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
