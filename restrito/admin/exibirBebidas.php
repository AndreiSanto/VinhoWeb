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
        <table align="center" border="1" cellspacing="0,5" cellpadding="5">
            <thead>
                <tr>
                    <th>DESCRIÇÃO</th>
                    <th>VOLUME</th>
                    <th>PREÇO</th>
                    <th>PESO</th>
                    <th>QUANTIDADE EM ESTOQUE</th>
                    <th>FABRICANTE</th>
                    <th>OPERAÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($listaBebidas as $bebida){
                        echo "<tr>";
                        echo "<td>".$bebida->nome."</td>";
                        echo "<td>".$bebida->volume."</td>";
                        echo "<td>".$bebida->preco."</td>";
                        echo "<td>".$bebida->peso."</td>";
                        echo "<td>".$bebida->qde_estoque."</td>";
                        echo "<td>".$bebida->fabricante."</td>";
                        echo "<td><a href='../../controller/controllerBebida.php?opcao=4&id=".$bebida->id_bebida."'>Editar</a>&nbsp";
                        echo "<a href='../../controller/controllerBebida.php?opcao=3&id=".$bebida->id_bebida."'>Excluir</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>