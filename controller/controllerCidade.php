<?php
    include_once "../dao/cidadeDao.php";
    include_once "../model/Cidade.php";

    $opcao = (int)$_REQUEST["opcao"];

    if($opcao == 1){
        $nomeCidade = $_REQUEST["nome"];
        $estado = $_REQUEST["estado"];
        $CEP = $_REQUEST["CEP"];
        $valorFrete = $_REQUEST["valorFrete"];
        $peso = $_REQUEST["peso"];

        $cidade = new Cidade($nomeCidade, $estado, $CEP, $valorFrete, $peso);
        $cidadeDao = new CidadeDao();
        $cidadeDao->insertCidade($cidade);

        header("location: controllerCidade.php?opcao=2");
        }

    else if($opcao == 2){
        $cidadeDao = new CidadeDao();
        $listaCidades = $cidadeDao->getCidades();
            
        session_start();
        $_SESSION["listaCidades"] = $listaCidades;

        header("location: ../restrito/exibirCidades.php");
    }
?>