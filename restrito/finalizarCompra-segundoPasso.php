<?php
    require_once "../dao/clienteDao.php";
    require_once "../dao/CidadeDao.php";

    $idCliente = $_REQUEST["cliente"];
    $subTotal = $_REQUEST["subTotal"];
    $peso = $_REQUEST["peso"];
    $clienteDao = new ClienteDao();
    $cidadeDao = new CidadeDao();
    $idCidade = $clienteDao->getCliente($idCliente)->id_cidade;
    $valorFrete = $cidadeDao->getCidade($idCidade)->valorfrete_porPeso * $peso;
    $valorTotal = $subTotal + $valorFrete;
    $idBebida = $_REQUEST["idBebida"];
    $qtdItem = $_REQUEST["qtdItem"];
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
</head>
<body>
    <p>Nome do cliente: <?php echo $clienteDao->getCliente($idCliente)->nome ?></p>
    <p>Valor total da compra: <?php echo $valorTotal ?></p>
    <form action="../controller/controllerCompra.php" method="POST">
        <input type="hidden" name="bNome" value="<?php echo $clienteDao->getCliente($idCliente)->nome?>"/>
        <input type="hidden" name="bId" value="<?php echo $idCliente ?>"/>
        <input type="hidden" name="bCnpj" value="<?php echo $clienteDao->getCliente($idCliente)->cnpj?>"/>
        <input type="hidden" name="bEndereco" value="<?php echo $clienteDao->getCliente($idCliente)->endereco?>"/>
        <input type="hidden" name="bCep" value="<?php echo $cidadeDao->getCidade($idCidade)->CEP?>"/>
        <input type="hidden" name="bEstado" value="<?php echo $cidadeDao->getCidade($idCidade)->estado?>"/>
        <input type="hidden" name="bCidade" value="<?php echo $cidadeDao->getCidade($idCidade)->cidade?>"/>
        <input type="hidden" name="total" value="<?php echo $valorTotal ?>"/>
        <input type="hidden" name="frete" value="<?php echo $valorFrete ?>"/>
        <input type="hidden" name="idBebida" value="<?php echo $idBebida ?>"/>
        <input type="hidden" name="qtdItem" value="<?php echo $qtdItem ?>"/>
        <input type="hidden" name="opcao" value="1">
        <input type="submit" value="Finalizar">
    </form>
</body>
</html>