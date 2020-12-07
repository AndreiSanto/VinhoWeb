<?php
    include_once "../dao/cidadeDao.php";
    include_once "../dao/clienteDao.php";
    include_once "../model/Cidade.php";

    $opcao = (int)$_REQUEST["opcao"];
    $cidadeDao = new CidadeDao();

    if($opcao == 1){
        $nomeCidade = $_REQUEST["nome"];
        $estado = $_REQUEST["estado"];
        $CEP = $_REQUEST["CEP"];
        $valorFrete = $_REQUEST["valorFrete"];
        $peso = $_REQUEST["peso"];
        $cidade = new Cidade($nomeCidade, $estado, $CEP, $valorFrete, $peso);
        $cidadeDao->insertCidade($cidade);
        header("location: controllerCidade.php?opcao=2");
    }
    
    else if($opcao == 2){

        $listaCidades = $cidadeDao->getCidades(); 
        session_start();
        $_SESSION["listaCidades"] = $listaCidades;

        if(!isset($_SESSION["listaCidades"]) || sizeof($_SESSION["listaCidades"]) == 0){
            header("location: ../restrito/admin/noCity.php");
        }
        else{
            header("location: ../restrito/admin/exibirCidades.php");
        }
    }

    else if($opcao == 3){
        $id = $_REQUEST["id"];
        $cidadeDao->deleteCidade($id);
        $clienteDao = new ClienteDao();
        $clienteDao->deleteClienteCidade($id);
        header("location: controllerCidade.php?opcao=2");
    }

    else if($opcao == 4){
        $id = $_REQUEST["id"];
        $cidade = $cidadeDao->getCidade($id);
        session_start();
        $_SESSION["cidade"] = $cidade;
        header("location: ../restrito/admin/formUpdateCidade.php");
    }

    else if($opcao == 5){
        $nomeCidade = $_REQUEST["nome"];
        $estado = $_REQUEST["estado"];
        $CEP = $_REQUEST["CEP"];
        $valorFrete = $_REQUEST["valorFrete"];
        $peso = $_REQUEST["peso"];
        $id = $_REQUEST["id"];

        $cidade = new Cidade($nomeCidade, $estado, $CEP, $valorFrete, $peso);
        $cidadeDao->updateCidade($cidade, $id);
        header("location: controllerCidade.php?opcao=2");
    }
?>