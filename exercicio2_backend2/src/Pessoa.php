<?php
namespace Daoo\Aula02;

require_once __DIR__ . '/IMCInterface.php';
require_once __DIR__ . '/Trabalhador.php';

use Exception;

class Pessoa extends Trabalhador implements IMCInterface
{
    protected string $nome;
    protected int $idade;
    protected float $peso;
    protected float $altura;

    public function __construct(string $nome, int $idade, float $peso, float $altura, string $profissao)
    {
        parent::__construct($profissao);
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function calcularIMC(): float
    {
        if ($this->peso <= 0 || $this->altura <= 0) {
            throw new Exception("Peso e altura inválidos para cálculo de IMC!");
        }
        return $this->peso / ($this->altura ** 2);
    }

    public function trabalhar(): string
    {
        return "{$this->nome} está trabalhando como {$this->profissao}.";
    }

    public function __toString(): string
    {
        return "Nome: {$this->nome}, Idade: {$this->idade}, Profissão: {$this->profissao}";
    }
}
