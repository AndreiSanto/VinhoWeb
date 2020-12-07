<?php
    require_once "../dao/BebidasDao.php";

    $bebidasDao = new BebidasDao();
    $opcao = (int)$_REQUEST["opcao"];

    if($opcao == 1){
        $listaBebidas = $bebidasDao->getBebidas();
        session_start();
        $_SESSION["bebidas"] = $listaBebidas;
        header("location: ../restrito/exibirOfertas.php");
    }
?>