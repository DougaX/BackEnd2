<?php
namespace Daoo\Aula02;

require_once __DIR__ . '/Pessoa.php';
require_once __DIR__ . '/IMC.php';

class Atleta extends Pessoa
{
    use IMC;

    private string $modalidade;
    private ?float $imc = null;

    public function __construct(string $nome, int $idade, float $peso, float $altura, string $profissao, string $modalidade)
    {
        parent::__construct($nome, $idade, $peso, $altura, $profissao);
        $this->modalidade = $modalidade;
    }

    public function trabalhar(): string
    {
        return "{$this->nome} está treinando {$this->modalidade}.";
    }

    public function __toString(): string
    {
        return parent::__toString() . ", Modalidade: {$this->modalidade}, Classificação: {$this->classifica()}";
    }
}
