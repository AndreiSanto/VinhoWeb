<?php
    include_once "../dao/BebidasDao.php";
    include_once "../model/ItemCompra.php";

    $opcao = (int)$_REQUEST["opcao"];
    $bebidasDao = new BebidasDao();

    if($opcao == 1){
        $dupl;
        $qtd = $_REQUEST["qtd"];
        $id = $_REQUEST["id"];
        $preco = $_REQUEST["preco"];

        $qtdEstoque = $bebidasDao->getBebida($id)->qde_estoque;

        if($qtd <= $qtdEstoque){
            $itemCompra = new ItemCompra($id, $qtd, $preco);
            session_start();
            if(!isset($_SESSION["carrinho"])){
                $carrinho = array();
            }else{
                $carrinho = $_SESSION["carrinho"];
            }
            foreach($carrinho as $registro){
                if($registro->getIdBebida() == $id){
                    $dupl = true;
                    break;
                }else{
                    $dupl = false;
                }
            }
            if($dupl == false){
                $carrinho[] = $itemCompra;
                $_SESSION["carrinho"] = $carrinho;
                header("location: ../restrito/exibirCarrinho.php");
            }else{
                header("location: ../restrito/exibirCarrinho.php");
            }
        }
        else{
            header("location: ../restrito/exibirCarrinhoErroQtd.php");
        }

    }

    else if($opcao == 2){
        session_start();
        $indice = $_REQUEST["indice"];
        $carrinho = $_SESSION["carrinho"];
        unset($carrinho[$indice - 1]);
        sort($carrinho);
        $_SESSION["carrinho"] = $carrinho;
        header("location: ../controller/controllerCarrinho.php?opcao=3");
    }

    else if($opcao == 3){
        session_start();

        if(!isset($_SESSION["carrinho"]) || sizeof($_SESSION["carrinho"]) == 0){
            header("location: ../restrito/carrinhoVazio.php");
        }
        else{
            header("location: ../restrito/exibirCarrinho.php");
        }
    }
?>