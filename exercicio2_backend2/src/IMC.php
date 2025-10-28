<?php
namespace Daoo\Aula02;

trait IMC
{
    public function calcIMC(): void
    {
        if (!isset($this->peso) || !isset($this->altura) || $this->altura <= 0) {
            throw new \Exception("Peso e altura devem ser válidos para cálculo do IMC!");
        }

        $this->imc = $this->peso / ($this->altura ** 2);
    }

    public function classifica(): string
    {
        if (!isset($this->imc)) {
            $this->calcIMC();
        }

        if ($this->imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($this->imc < 25) {
            return "Peso normal";
        } elseif ($this->imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    public function isNormal(): bool
    {
        if (!isset($this->imc)) {
            $this->calcIMC();
        }

        // Exemplo: faixa normal válida para adultos até 65 anos
        return $this->imc >= 18.5 && $this->imc <= 24.9;
    }
}