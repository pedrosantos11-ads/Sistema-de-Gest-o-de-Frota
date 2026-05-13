<?php

require_once 'Motorista.php';
require_once 'Veiculo.php';
require_once 'Viagem.php';

$motoristaInvalido = new Motorista();
$motoristaInvalido->setNome("Pedro CNH Vencida");
$motoristaInvalido->setCpf("12345678901");
$motoristaInvalido->setCnh("123456");
$motoristaInvalido->setValidadeCnh(2020);

$motoristaValido = new Motorista();
$motoristaValido->setNome("Maria CNH Ok");
$motoristaValido->setCpf("10987654321");
$motoristaValido->setCnh("654321");
$motoristaValido->setValidadeCnh(2025);

$veiculoComPoucoCombustivel = new Veiculo();
$veiculoComPoucoCombustivel->setPlaca("ABC1234");
$veiculoComPoucoCombustivel->setModelo("Caminhão Pequeno");
$veiculoComPoucoCombustivel->setCapacidadeTanque(100);
$veiculoComPoucoCombustivel->setCombustivelAtual(5);

$veiculoPronto = new Veiculo();
$veiculoPronto->setPlaca("XYZ9876");
$veiculoPronto->setModelo("Caminhão Grande");
$veiculoPronto->setCapacidadeTanque(200);
$veiculoPronto->setCombustivelAtual(150);

echo "=== Teste 1: CNH vencida ===\n";
$viagemCnhVencida = new Viagem(
    "São Paulo",
    100,
    $motoristaInvalido,
    $veiculoPronto
);
$viagemCnhVencida->iniciarViagem();
$viagemCnhVencida->gerarRelatorio();

echo "\n=== Teste 2: Combustível insuficiente ===\n";
$viagemCombustivelInsuficiente = new Viagem(
    "Rio de Janeiro",
    300,
    $motoristaValido,
    $veiculoComPoucoCombustivel
);
$viagemCombustivelInsuficiente->iniciarViagem();
$viagemCombustivelInsuficiente->gerarRelatorio();

echo "\n=== Teste 3: Viagem OK ===\n";
$viagemOk = new Viagem(
    "Belo Horizonte",
    500,
    $motoristaValido,
    $veiculoPronto
);
$viagemOk->iniciarViagem();
$viagemOk->gerarRelatorio();