<?php
    include_once "../dao/cidadeDao.php";
    include_once "../model/Cliente.php";
    include_once "../dao/clienteDao.php";

    $opcao = (int)$_REQUEST["opcao"];
    $clienteDao = new ClienteDao();

    if($opcao == 1){

        $cidadeDao = new CidadeDao();
        $lista = $cidadeDao->getCidades();

        session_start();
        $_SESSION["cidades"] = $lista;
        header("location: ../restrito/formCliente.php");
    }

    else if($opcao == 2){
        $nomeCliente = $_REQUEST["nomeCliente"];
        $CNPJCliente = $_REQUEST["CNPJCliente"];
        $enderecoCliente = $_REQUEST["enderecoCliente"];
        $idCidadeCliente = $_REQUEST["cidadeCliente"];

        $cliente = new Cliente($nomeCliente, $CNPJCliente, $enderecoCliente, $idCidadeCliente);
        $clienteDao->insertCliente($cliente);
    }
?>