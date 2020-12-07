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
        <p><a href="#">Carrinho</a></p>
        <?php
            foreach($listaBebidas as $bebida){
                echo "<table border='1' width='50%' cellspacing='5'>";
                echo "<tr>";
                echo"<td rowspan='6' align='center'><img src='../image/drink_".$bebida->id_bebida.".png' width='200' height='200' border='0'/></td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td>".$bebida->nome."</td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td>".$bebida->volume."</td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td>".$bebida->preco."</td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td>".$bebida->fabricante."</td>";
                echo "</tr>";
                echo "<tr>";
                echo"<td align='center'><a href='#'>Adicionar ao carrinho</a></td>";
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