<?php
    include_once "../model/Bebida.php";
    include_once "../dao/BebidasDao.php";

    $opcao = (int)$_REQUEST["opcao"];
    $bebidasDao = new BebidasDao();
    
    if($opcao == 1){
       $descricao = $_REQUEST["descricao"];
       $volume = $_REQUEST["volume"]; 
       $preco = $_REQUEST["preco"]; 
       $peso = $_REQUEST["peso"]; 
       $qtdEstoque = $_REQUEST["qtdEstoque"]; 
       $fabricante = $_REQUEST["fabricante"];

       $bebida = new Bebida($descricao, $volume, $preco, $peso, $qtdEstoque, $fabricante);
       $bebidasDao->insertBebida($bebida);
       header("location: controllerBebida.php?opcao=2");
    }

    else if($opcao == 2){
       $listaBebidas = $bebidasDao->getBebidas();
       session_start();
       $_SESSION["bebidas"] = $listaBebidas;
       if(!isset($_SESSION["bebidas"]) || sizeof($_SESSION["bebidas"]) == 0){
        header("location: ../restrito/admin/noBeverage.php");
    }else{
       header("location: ../restrito/admin/exibirBebidas.php"); 
    }
}

    else if($opcao == 3){
        $id = $_REQUEST["id"];
        $bebidasDao->deletarBebida($id);
        header("location: ../controller/controllerBebida.php?opcao=2");
    }

    else if ($opcao == 4){
        $id = $_REQUEST["id"];
        $bebida = $bebidasDao->getBebida($id);
        session_start();
        $_SESSION["bebida"] = $bebida;
        header("location: ../restrito/admin/formUpdateBebida.php");
    }

    else if ($opcao == 5){
        $id = $_REQUEST["id"];
        $descricao = $_REQUEST["descricao"];
        $volume = $_REQUEST["volume"]; 
        $preco = $_REQUEST["preco"]; 
        $peso = $_REQUEST["peso"]; 
        $qtdEstoque = $_REQUEST["qtdEstoque"]; 
        $fabricante = $_REQUEST["fabricante"];

        $bebida = new Bebida($descricao, $volume, $preco, $peso, $qtdEstoque, $fabricante);
        $bebida->setId($id);
        $bebidasDao->updateBebida($bebida);
        header("location: ../controller/controllerBebida.php?opcao=2");
    }
