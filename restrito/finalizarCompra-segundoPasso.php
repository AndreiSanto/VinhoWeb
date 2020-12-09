<?php
    require_once "../dao/clienteDao.php";
    require_once "../dao/CidadeDao.php";

    $idCLiente = $_REQUEST["cliente"];
    $subTotal = $_REQUEST["subTotal"];
    $peso = $_REQUEST["peso"];
    $clienteDao = new ClienteDao();
    $cidadeDao = new CidadeDao();
    $idCidade = $clienteDao->getCliente($idCLiente)->id_cidade;
    $valorFrete = $cidadeDao->getCidade($idCidade)->valorfrete_porPeso * $peso;
    $valorTotal = $subTotal + $valorFrete;
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
</head>
<body>
    <p>Nome do cliente: <?php echo $clienteDao->getCliente($idCLiente)->nome ?></p>
    <p>Valor total da compra: <?php echo $valorTotal ?></p>
    <a href="#">GERAR BOLETO</a>
</body>
</html>