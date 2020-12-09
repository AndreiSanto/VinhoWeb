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
        <h1>Carrinho</h1>
        <table align="center" border="1" cellspacing="0,5" cellpadding="5">
            <tr>
                <th>INDICE</th>
                <th>CODIGO</th>
                <th>DESCRIÇÃO</th>
                <th>VOLUME</th>
                <th>PREÇO UN</th>
                <th>QUANTIDADE</th>
                <th>FABRICANTE</th>
                <th>REMOVER</th>
            </tr>
                <?php
                    $cont = 0;
                    $soma = 0;
                    foreach($carrinho as $itemCompra){
                        $bebida = $bebidaDao->getBebida($itemCompra->getIdBebida());
                        $cont++;
                        $soma = $soma + ($itemCompra->getValorItem() * $itemCompra->getQuantidade()); 
                        echo "<tr>";
                        echo "<td>".$cont."</td>";
                        echo "<td>".$itemCompra->getIdBebida()."</td>";
                        echo "<td>".$bebida->nome."</td>";
                        echo "<td>".$bebida->volume."</td>";
                        echo "<td>".$bebida->preco."</td>";
                        echo "<td>".$itemCompra->getQuantidade()."</td>";
                        echo "<td>".$bebida->fabricante."</td>";
                        echo "<td><a href='../controller/controllerCarrinho.php?opcao=2&indice=".$cont."'>remover</a></td>";
                        echo "</tr>";
                        
                    }
                    echo "<tr>";
                    echo "<td colspan='7' align='center'>Total: ".$soma."</td>";
                    echo "</tr>";
                ?>
        </table>
        <a href="../controller/controllerOfertas.php?opcao=1">Continuar Comprando</a>
    </div>
</body>
</html>