<?php 
    require_once "../model/Compra.php";
    require_once "../dao/CompraDao.php";
    require_once "../dao/BebidasDao.php";

    $opcao = (int)$_REQUEST["opcao"];
    $compraDao = new CompraDao();
    $bebidaDao = new BebidasDao();

    if($opcao == 1){

        $idCliente = $_REQUEST["bId"];
        $valorTotal = $_REQUEST["total"];
        $valorFrete = $_REQUEST["frete"];
        $idBebida = $_REQUEST["idBebida"];
        $qtdItem = $_REQUEST["qtdItem"];

        $compra = New Compra($idCliente, $valorTotal, $valorFrete);

        //$compraDao->insertCompra($compra);
        $qtd = $bebidaDao->getBebida($idBebida)->qde_estoque - $qtdItem; 
        $bebidaDao->updateQtdBebida($idBebida, $qtd);

        session_start();

        $_SESSION["bNome"] = $_REQUEST["bNome"];
        $_SESSION["bCnpj"] = $_REQUEST["bCnpj"];
        $_SESSION["bEndereco"] = $_REQUEST["bEndereco"];
        $_SESSION["bCep"] = $_REQUEST["bCep"];
        $_SESSION["bEstado"] = $_REQUEST["bEstado"];
        $_SESSION["bCidade"] = $_REQUEST["bCidade"];
        $_SESSION["bValorTotal"] = $valorTotal;

        header("location: ../restrito/boleto/meuBoleto.php");
    }
?>