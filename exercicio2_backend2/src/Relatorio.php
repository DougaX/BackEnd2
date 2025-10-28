<?php
namespace Daoo\Aula02;

class Relatorio
{
    private array $pessoas = [];

    public function add(Pessoa $p)
    {
        $this->pessoas[] = $p;
    }

    public function log()
    {
        foreach ($this->pessoas as $pessoa) {
            echo $pessoa . "<br>";

            if ($pessoa instanceof iFuncionario) {
                echo $pessoa->mostrarSalario() . "<br>";
                echo $pessoa->mostrarTempoContrato() . "<br>";
            }

            echo "<hr>";
        }
    }
}