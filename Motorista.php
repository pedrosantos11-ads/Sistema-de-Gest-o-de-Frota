<?php

class Motorista
{
    private string $nome;
    private string $cpf;
    private string $cnh;
    private int $validadeCnh;

    public function setNome(string $nome): void
    {
        $nome = trim($nome);

        if ($nome === '') {
            echo "Nome inválido\n";
            return;
        }

        $this->nome = $nome;
    }

    public function setCpf(string $cpf): void
    {
        $cpf = trim($cpf);

        if ($cpf === '') {
            echo "CPF inválido\n";
            return;
        }

        if (strlen($cpf) != 11) {
            echo "CPF inválido\n";
            return;
        }

        $this->cpf = $cpf;
    }

    public function setCnh(string $cnh): void
    {
        $cnh = trim($cnh);

        if ($cnh === '') {
            echo "CNH inválida\n";
            return;
        }

        $this->cnh = $cnh;
    }

    public function setValidadeCnh(int $ano): void
    {
        if ($ano < 1900) {
            echo "Ano de validade da CNH inválido\n";
            return;
        }

        $this->validadeCnh = $ano;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getCnh(): string
    {
        return $this->cnh;
    }

    public function getValidadeCnh(): int
    {
        return $this->validadeCnh;
    }
}