<?php

class Pessoa
{
    private string $nome;
    private int $idade;
    private float $peso;
    private float $altura;
    private ?float $imc = null;

    public function __construct(string $nome, int $idade, float $peso, float $altura)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function __destruct()
    {
        echo "<p>Destruindo objeto de {$this->nome}</p>";
    }

    public function calcularIMC(): float
    {
        if ($this->peso <= 0 || $this->altura <= 0) {
            throw new Exception("Peso e altura devem ser maiores que zero!");
        }

        $this->imc = $this->peso / ($this->altura ** 2);
        return $this->imc;
    }

    public function getIMC(): ?float
    {
        return $this->imc;
    }

    public function setPeso(float $peso): void
    {
        $this->peso = $peso;
    }

    public function setAltura(float $altura): void
    {
        $this->altura = $altura;
    }

    public function __toString(): string
    {
        return "Nome: {$this->nome}, Idade: {$this->idade}, Peso: {$this->peso}kg, Altura: {$this->altura}m";
    }
}