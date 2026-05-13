<?php

class Viagem
{
    private string $destino;
    private float $distanciaTotal;
    private Motorista $motorista;
    private Veiculo $veiculo;

    public function __construct(
        string $destino,
        float $distanciaTotal,
        Motorista $motorista,
        Veiculo $veiculo
    ) {
        $this->destino = $destino;
        $this->distanciaTotal = $distanciaTotal;
        $this->motorista = $motorista;
        $this->veiculo = $veiculo;
    }

    public function iniciarViagem(): void
    {
        if ($this->motorista->getValidadeCnh() < 2024) {
            echo "Não é possível iniciar a viagem: CNH vencida.\n";
            return;
        }

        $litrosNecessarios = $this->distanciaTotal / 10;

        if ($this->veiculo->getCombustivelAtual() < $litrosNecessarios) {
            echo "Não é possível iniciar a viagem: combustível insuficiente.\n";
            return;
        }

        $this->veiculo->viajar($this->distanciaTotal);

        echo "Viagem para {$this->destino} iniciada com sucesso.\n";
    }

    public function gerarRelatorio(): void
    {
        echo "Relatório da Viagem:\n";
        echo "Destino: {$this->destino}\n";
        echo "Distância: {$this->distanciaTotal} km\n";
        echo "Motorista: {$this->motorista->getNome()}\n";
        echo "Veículo: {$this->veiculo->getModelo()} - Placa {$this->veiculo->getPlaca()}\n";
        echo "Combustível restante: {$this->veiculo->getCombustivelAtual()} litros\n";
    }
}