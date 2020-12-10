<?php
    session_start();

    $listaBebidas = $_SESSION["bebidas"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas</title>
</head>
<body>
    <div align="center">
        <h1>BEBIDAS</h1>
        <p><a href="../controller/controllerCarrinho.php?opcao=3">Carrinho</a></p>
        <?php
            foreach($listaBebidas as $bebida){
                echo "<table width='50%' cellspacing='5'>";
                echo "<tr>";
                echo"<td rowspan='7' align='center'><img src='../image/drink_".$bebida->id_bebida.".png' width='200' height='200' border='0'/></td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td>Descricao: ".$bebida->nome."</td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td>Volume:".$bebida->volume."</td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td>Preço:".$bebida->preco."</td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td>Fabricante:".$bebida->fabricante."</td>";
                echo "</tr>";
                echo "<td><form method='POST' action='../controller/controllerCarrinho.php'>
                        Quantidade: <br><input type='number' name='qtd' required/><br>
                        <input type='submit' value='Adicionar ao carrinho'/>
                        <input type='hidden' name='id' value='".$bebida->id_bebida."'/>
                        <input type='hidden' name='preco' value='".$bebida->preco."'/>
                        <input type='hidden' name='opcao' value='1'/>
                        </form></td>";
                echo "<tr>";
                echo "</tr>";
                echo "</table>
                <p>
                <hr width='50%'>
                </p>";
            }
        ?>
    </div>
</body>
</html>