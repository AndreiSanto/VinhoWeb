<?php
    $usuarioCliente = "cliente";
    $senhaCliente = "cliente";

    $usuarioAdmin = "admin";
    $senhaAdmin = "admin";

    $usuario = $_REQUEST["usuario"];
    $senha = $_REQUEST["senha"];

    if($usuarioCliente == $usuario){
        if($senhaCliente == $senha){
            echo "Cliente logado";
        }
        else{
            echo "Senha inválida";
        }
    }
    else if($usuarioAdmin == $usuario){
        if($senhaAdmin == $senha){
            header("location: ../restrito/menuAdmin.html");
        }
        else{
            echo "Senha inválida";
        }
    }

    else{
        echo "Usuario inválido";
    }
?>