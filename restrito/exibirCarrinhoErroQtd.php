<?php
    require_once "../dao/BebidasDao.php";
    require_once "../model/ItemCompra.php";

    $bebidaDao = new BebidasDao();
    session_start();
    $carrinho = $_SESSION["carrinho"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div align="center">
        <p>QUANTIDADE INDISPONIVEL EM ESTOQUE!</p>
        <a href="../controller/controllerOfertas.php?opcao=1">Continuar Comprando</a>
    </div>
</body>
</html>