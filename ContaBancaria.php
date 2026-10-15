<?php
class ContaBancaria {
    private $numeroConta;
    private $nomeTitular;
    private $cpf;
    private $agencia;
    private $tipoConta;
    private $saldo;
    private $situacao;
    public function __construct($numeroConta, $nomeTitular, $cpf, $agencia, $tipoConta) {
    $this->numeroConta = $numeroConta;
    $this->nomeTitular = $nomeTitular;
    $this->cpf = $cpf;
    $this->agencia = $agencia;
    $this->tipoConta = $tipoConta;
    $this->saldo = 0;
    $this->situacao = "Ativa";
    }
    public function apresentarDados() {
    echo "Banco Horizonte\n";
    echo "Conta: " . $this->numeroConta . "\n";
    echo "Titular: " . $this->nomeTitular . "\n";
    echo "CPF: " . $this->cpf . "\n";
    echo "Agência: " . $this->agencia . "\n";
    echo "Tipo: " . $this->tipoConta . "\n";
    echo "Saldo: R$ " . $this->saldo . "\n";
    echo "Situação: " . $this->situacao . "\n";
    }
    public function depositar($valor) {
    if ($this->situacao == "Bloqueada") {
    echo "Não é permitido depositar em conta bloqueada.\n";
    } else if ($valor <= 0) {
    echo "Valor do depósito deve ser maior que zero.\n";
    } else {
    $this->saldo = $this->saldo + $valor;
    echo "Depósito de R$ " . $valor . " realizado.\n";
    }
    }
    public function sacar($valor) {
    if ($this->situacao == "Bloqueada") {
        echo "Não é permitido sacar de conta bloqueada.\n";
        } else if ($valor <= 0) {
        echo "Valor do saque deve ser maior que zero.\n";
        } else if ($valor > $this->saldo) {
        echo "Saldo insuficiente para o saque.\n";
        } else {
        $this->saldo = $this->saldo - $valor;
    echo "Saque de R$ " . $valor . " realizado.\n";
        }
    }
    public function consultarSaldo() {
    echo "Saldo atual: R$ " . $this->saldo . "\n";
    }

    public function alterarTitular($novoNome) {
    if ($novoNome == "") {
        echo "Nome do titular não pode ser vazio.\n";
        } else {
        $this->nomeTitular = $novoNome;
        echo "Titular alterado para " . $this->nomeTitular . ".\n";
        }
    }
    public function bloquearConta() {
    $this->situacao = "Bloqueada";
    echo "Conta " . $this->numeroConta . " bloqueada.\n";
    }
    public function desbloquearConta() {
        $this->situacao = "Ativa";
        echo "Conta " . $this->numeroConta . " desbloqueada.\n";
    }
    public function transferir($valor, $contaDestino) {
    if ($valor <= 0) {
    echo "Valor da transferência deve ser maior que zero.\n";
    } else if ($this->situacao == "Bloqueada" || $contaDestino->situacao == "Bloqueada") {
        echo "Ambas as contas devem estar ativas.\n";
     } else if ($valor > $this->saldo) {
    echo "Saldo insuficiente para transferência.\n";
    } else {
    $this->saldo = $this->saldo - $valor;
    $contaDestino->saldo = $contaDestino->saldo + $valor;
    echo "Transferência de R$ " . $valor . " realizada.\n";
    }
    }
    public function emitirRelatorio() {
    echo "Relatório da Conta\n";
    echo "Conta: " . $this->numeroConta . "\n";
    echo "Titular: " . $this->nomeTitular . "\n";
    echo "Agência: " . $this->agencia . "\n";
    echo "Tipo: " . $this->tipoConta . "\n";
    echo "Saldo: R$ " . $this->saldo . "\n";
    echo "Situação: " . $this->situacao . "\n";
    }
}