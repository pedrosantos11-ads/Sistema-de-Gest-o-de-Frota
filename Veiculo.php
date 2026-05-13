<?php

class Veiculo
{
    private string $placa;
    private string $modelo;
    private float $capacidadeTanque;
    private float $combustivelAtual;

    public function setPlaca(string $placa): void
    {
        $placa = trim($placa);

        if ($placa === '') {
            echo "Placa inválida\n";
            return;
        }

        $this->placa = $placa;
    }

    public function setModelo(string $modelo): void
    {
        $modelo = trim($modelo);

        if ($modelo === '') {
            echo "Modelo inválido\n";
            return;
        }

        $this->modelo = $modelo;
    }

    public function setCapacidadeTanque(float $capacidade): void
    {
        if ($capacidade <= 0) {
            echo "Capacidade do tanque deve ser maior que zero\n";
            return;
        }

        $this->capacidadeTanque = $capacidade;
    }

    public function setCombustivelAtual(float $combustivel): void
    {
        if ($combustivel < 0) {
            echo "Combustível não pode ser negativo\n";
            return;
        }

        if (isset($this->capacidadeTanque) && $combustivel > $this->capacidadeTanque) {
            echo "Combustível não pode ser maior que a capacidade do tanque\n";
            return;
        }

        $this->combustivelAtual = $combustivel;
    }

    public function abastecer(float $litros): void
    {
        if ($litros <= 0) {
            echo "Quantidade de litros para abastecer deve ser maior que zero\n";
            return;
        }

        $novoNivel = $this->combustivelAtual + $litros;

        if ($novoNivel > $this->capacidadeTanque) {
            echo "Não é possível abastecer: litros excedem a capacidade do tanque\n";
            return;
        }

        $this->combustivelAtual = $novoNivel;
    }

    public function viajar(float $distancia): void
    {
        if ($distancia <= 0) {
            echo "Distância deve ser maior que zero\n";
            return;
        }

        $litrosNecessarios = $distancia / 10;

        if ($this->combustivelAtual < $litrosNecessarios) {
            echo "Viagem não realizada: combustível insuficiente\n";
            return;
        }

        $this->combustivelAtual -= $litrosNecessarios;
    }

    public function getPlaca(): string
    {
        return $this->placa;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getCapacidadeTanque(): float
    {
        return $this->capacidadeTanque;
    }

    public function getCombustivelAtual(): float
    {
        return $this->combustivelAtual;
    }
}