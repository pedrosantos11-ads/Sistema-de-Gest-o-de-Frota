# Sistema de Gestão de Frota (Atividade POO em PHP)

Atividade da disciplina de Programação Orientada a Objetos em PHP, simulando um sistema simples de gestão de frota com foco em **encapsulamento**, **validação** e **relacionamento entre objetos**. [file:96]

O projeto trabalha com três entidades principais:

- **Motorista** (`Motorista.php`): representa o condutor, com dados pessoais e validade da CNH.
- **Veículo** (`Veiculo.php`): representa o veículo, com informações de placa, modelo e combustível.
- **Viagem** (`Viagem.php`): representa uma viagem, relacionando um motorista e um veículo a um destino e distância total.

## Tecnologias utilizadas

- PHP 8.x (modo CLI)
- Execução em linha de comando (sem framework)

## Estrutura das classes

### Motorista

Arquivo: `Motorista.php` [file:94]

- Atributos privados:
  - `nome`
  - `cpf`
  - `cnh`
  - `validadeCnh`
- Métodos principais:
  - Setters com validação básica (ex.: nome não vazio, CPF com 11 caracteres).
  - Getters para acesso controlado aos atributos.
  - Utilizado pela classe `Viagem` para validar a CNH antes de iniciar a viagem.

### Veículo

Arquivo: `Veiculo.php` [file:95]

- Atributos privados:
  - `placa`
  - `modelo`
  - `capacidadeTanque`
  - `combustivelAtual`
- Métodos principais:
  - `setCapacidadeTanque(float $capacidade)`: define a capacidade máxima do tanque.
  - `setCombustivelAtual(float $combustivel)`: define o nível atual de combustível, respeitando os limites da capacidade.
  - `abastecer(float $litros)`: adiciona combustível sem exceder a capacidade.
  - `viajar(float $distancia)`: consome combustível com base em um consumo médio de 10 km/l.
  - Getters para leitura dos atributos pela classe `Viagem`.

### Viagem

Arquivo: `Viagem.php` [file:97]

- Atributos privados:
  - `destino`
  - `distanciaTotal`
  - `motorista` (objeto `Motorista`)
  - `veiculo` (objeto `Veiculo`)
- Construtor:
  - Recebe o destino, a distância total, um `Motorista` e um `Veiculo`, formando o relacionamento entre as classes.
- Métodos principais:
  - `iniciarViagem()`: verifica se a CNH do motorista é válida (ano mínimo configurado no código) e se o veículo possui combustível suficiente para a distância informada antes de chamar o método `viajar` do veículo.
  - `gerarRelatorio()`: exibe os dados da viagem, motorista, veículo e o combustível restante após a tentativa de viagem.

## Script de testes (index.php)

Arquivo: `index.php` [file:96]

O arquivo `index.php` cria objetos de `Motorista`, `Veiculo` e `Viagem` para simular diferentes cenários:

- Motorista com CNH vencida.
- Veículo com combustível insuficiente para a distância.
- Cenário em que a viagem é realizada com sucesso.

Para cada cenário, são exibidas mensagens no terminal indicando se a viagem foi iniciada ou bloqueada e, ao final, um relatório da viagem.

## Como executar o projeto

1. Certifique-se de ter o PHP instalado (versão 8.x ou compatível).
2. Coloque todos os arquivos na mesma pasta:
   - `Motorista.php`
   - `Veiculo.php`
   - `Viagem.php`
   - `index.php`
   - `README.md`
3. No terminal, navegue até a pasta do projeto e execute:

```bash
php index.php
```

As mensagens dos três cenários de teste serão exibidas diretamente no terminal.

## Autor

- Seu Nome Completo – RA: XXXXXXX
- Disciplina: Programação Orientada a Objetos (POO)
