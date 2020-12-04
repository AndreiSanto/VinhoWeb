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
        if(!isset($_SESSION["cidades"]) || sizeof($_SESSION["cidades"]) == 0){
            header("location: ../restrito/noCity.php");
        }
        else{
            header("location: ../restrito/formCliente.php");
        }
    }

    else if($opcao == 2){
        $nomeCliente = $_REQUEST["nomeCliente"];
        $CNPJCliente = $_REQUEST["CNPJCliente"];
        $enderecoCliente = $_REQUEST["enderecoCliente"];
        $idCidadeCliente = $_REQUEST["cidadeCliente"];

        $cliente = new Cliente($nomeCliente, $CNPJCliente, $enderecoCliente, $idCidadeCliente);
        $clienteDao->insertCliente($cliente);
        header("location: controllerCliente.php?opcao=3");
    }

    else if($opcao == 3){
        $listaClientes = $clienteDao->getClientes();
        session_start();
        $_SESSION["clientes"] = $listaClientes;

        if(!isset($_SESSION["clientes"]) || sizeof($_SESSION["clientes"]) == 0){
            header("location: ../restrito/noUser.php");
        }
        else{
            header("location: ../restrito/exibirClientes.php");
        }
    }

    else if ($opcao == 4){
        $id = $_REQUEST["id"];
        $clienteDao->deleteCliente($id);
        header("location: controllerCliente.php?opcao=3");
    }

    else if ($opcao == 5){
        $id = $_REQUEST["id"];
        $cliente = $clienteDao->getCliente($id);
        session_start();
        $_SESSION["cliente"] = $cliente;
        header("location: ../restrito/formUpdateCliente.php");
    }

    else if ($opcao == 6){
        $nomeCliente = $_REQUEST["nomeCliente"];
        $CNPJCliente = $_REQUEST["CNPJCliente"];
        $enderecoCliente = $_REQUEST["enderecoCliente"];
        $idCidadeCliente = $_REQUEST["cidadeCliente"];
        $id = $_REQUEST["id"];

        $cliente = new Cliente($nomeCliente, $CNPJCliente, $enderecoCliente, $idCidadeCliente);
        $clienteDao->updateCliente($cliente, $id);
        header("location: controllerCliente.php?opcao=3");
    }
?>