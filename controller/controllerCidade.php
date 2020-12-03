<?php
    include_once "../dao/cidadeDao.php";
    include_once "../model/Cidade.php";

    $opcao = (int)$_REQUEST["opcao"];

    switch($opcao){

        case 1:
            $nomeCidade = $_REQUEST["nome"];
            $estado = $_REQUEST["estado"];
            $CEP = $_REQUEST["CEP"];
            $valorFrete = $_REQUEST["valorFrete"];
            $peso = $_REQUEST["peso"];

            $cidade = new Cidade($nomeCidade, $estado, $CEP, $valorFrete, $peso);
            $cidadeDao = new CidadeDao();
            $cidadeDao->insertCidade($cidade);

            header("location: ../restrito/exibirCidades.php");
    }
?>