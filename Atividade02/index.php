<?php
require_once __DIR__ . '/vendor/autoload.php';

use Daoo\Aula02\{Pessoa, Atleta, Relatorio};

$p1 = new Pessoa("Vinícius", 22, 75, 1.78, "Programador");
$a1 = new Atleta("Maria", 28, 60, 1.70, "Atleta", "Corrida", 5000, 3);

$rel = new Relatorio();
$rel->add($p1);
$rel->add($a1);
$rel->log();