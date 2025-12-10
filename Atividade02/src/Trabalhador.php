<?php
namespace Daoo\Aula02;

abstract class Trabalhador
{
    protected string $profissao;

    public function __construct(string $profissao)
    {
        $this->profissao = $profissao;
    }

    abstract public function trabalhar(): string;
}
