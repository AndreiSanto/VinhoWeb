<?php
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
                <th>FABRICANTE</th>
                <th>REMOVER</th>
            </tr>
                <?php
                    $cont = 0;
                    foreach($carrinho as $bebida){
                        $cont++;
                        echo "<tr>";
                        echo "<td>".$cont."</td>";
                        echo "<td>".$bebida->id_bebida."</td>";
                        echo "<td>".$bebida->nome."</td>";
                        echo "<td>".$bebida->volume."</td>";
                        echo "<td>".$bebida->preco."</td>";
                        echo "<td>".$bebida->fabricante."</td>";
                        echo "<td><a href='../controller/controllerCarrinho.php?opcao=2&indice=".$cont."'>remover</a></td>";
                        echo "</tr>";
                    }
                ?>
        </table>
        <a href="../controller/controllerOfertas.php?opcao=1">Continuar Comprando</a>
    </div>
</body>
</html>