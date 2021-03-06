<?php

session_start();

require 'autoloader.php';

use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;

$sacado = new Agente($_SESSION["bNome"], $_SESSION["bCnpj"], $_SESSION["bEndereco"], $_SESSION["bCep"], $_SESSION["bEstado"], $_SESSION["bCidade"]);
$cedente = new Agente('Distribuidora de bebidas LTDA', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Alegre', 'ES');

$boleto = new BancoDoBrasil(array(
    // Parâmetros obrigatórios
    'dataVencimento' => new DateTime('+5 days'),
    'valor' => (float)$_SESSION["bValorTotal"],
    'sequencial' => 1234567,
    'sacado' => $sacado,
    'cedente' => $cedente,
    'agencia' => 1724, // Até 4 dígitos
    'carteira' => 18,
    'conta' => 10403005, // Até 8 dígitos
    'convenio' => 1234, // 4, 6 ou 7 dígitos

    // Caso queira um número sequencial de 17 dígitos, a cobrança deverá:
    // - Ser sem registro (Carteiras 16 ou 17)
    // - Convênio com 6 dígitos
    // Para isso, defina a carteira como 21 (mesmo sabendo que ela é 16 ou 17, isso é uma regra do banco)

    // Parâmetros recomendáveis
    //'logoPath' => 'http://empresa.com.br/logo.jpg', // Logo da sua empresa
    'contaDv' => 2,
    'agenciaDv' => 1,
    'descricaoDemonstrativo' => array( // Até 5
        'Compra de bebidas',
        'Bebidas em geral',
    ),
    'instrucoes' => array( // Até 8
        'Após o dia 30/11 cobrar 2% de mora e 1% de juros ao dia.',
        'Não receber após o vencimento.',
    ),

    // Parâmetros opcionais
    //'resourcePath' => '../resources',
    //'moeda' => BancoDoBrasil::MOEDA_REAL,
    //'dataDocumento' => new DateTime(),
    //'dataProcessamento' => new DateTime(),
    //'contraApresentacao' => true,
    //'pagamentoMinimo' => 23.00,
    //'aceite' => 'N',
    //'especieDoc' => 'ABC',
    'numeroDocumento' => $sacado->getDocumento(),
    //'usoBanco' => 'Uso banco',
    //'layout' => 'layout.phtml',
    //'logoPath' => 'http://boletophp.com.br/img/opensource-55x48-t.png',
    //'sacadorAvalista' => new Agente('Antônio da Silva', '02.123.123/0001-11'),
    //'descontosAbatimentos' => 123.12,
    //'moraMulta' => 123.12,
    //'outrasDeducoes' => 123.12,
    //'outrosAcrescimos' => 123.12,
    //'valorCobrado' => 123.12,
    //'valorUnitario' => 123.12,
    //'quantidade' => 1,
));

echo $boleto->getOutput();
