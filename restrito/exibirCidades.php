<?php
    session_start();
    $listaCidades = $_SESSION["listaCidades"];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Controle de cidades</title>
    </head>
    <body>
        <h1 align="center">CIDADES</h1>
        <table align="center" border="1" cellspacing="0,5" cellpadding="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>ESTADO</th>
                    <th>CEP</th>
                    <th>VALOR FRETE</th>
                    <th>PESO</th>
                    <th>OPERAÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($listaCidades as $cidade){
                        echo "<tr align='center'>";
                        echo "<td>".$cidade->id_cidade."</td>";
                        echo "<td>".$cidade->cidade."</td>";
                        echo "<td>".$cidade->estado."</td>";
                        echo "<td>".$cidade->CEP."</td>";
                        echo "<td>".$cidade->valorfrete_porPeso."</td>";
                        echo "<td>".$cidade->peso."</td>";
                        echo "<td><a href='#'>Editar</a>&nbsp";
                        echo "<a href='#'>Excluir</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>