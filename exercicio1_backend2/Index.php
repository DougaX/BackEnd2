<?php
require_once "Pessoa.php";

try {
    $p1 = new Pessoa("Vinícius", 22, 75, 1.78);
    $p2 = new Pessoa("Maria", 30, 60, 1.65);

    echo $p1 . "<br>IMC: " . number_format($p1->calcularIMC(), 2) . "<br><br>";
    echo $p2 . "<br>IMC: " . number_format($p2->calcularIMC(), 2) . "<br>";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
