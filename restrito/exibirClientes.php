<?php
    include_once "../dao/CidadeDao.php";

    session_start();
    $clientes = $_SESSION["clientes"];
    $cidadeDao = new CidadeDao();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Clientes cadastrados</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1 align="center">Clientes</h1>
        <table align="center" border="1" cellspacing="0,5" cellpadding="5">
            <thead>
                <th>ID</th>
                <th>NOME</th>
                <th>CNPJ</th>
                <th>ENDERECO</th>
                <th>CIDADE</th>
                <th>OPERAÇÕES</th>
            </thead>
            <tbody>
                <?php
                    foreach($clientes as $cliente){
                        echo "<tr>";
                        echo "<td>".$cliente->id_cliente."</td>";
                        echo "<td>".$cliente->nome."</td>";
                        echo "<td>".$cliente->cnpj."</td>";
                        echo "<td>".$cliente->endereco."</td>";
                        echo "<td>".$cidadeDao->getNomeCidade($cliente->id_cidade)."</td>";
                        echo "<td><a href='../controller/controllerCliente.php?opcao=5&id=".$cliente->id_cliente."'>Editar</a>&nbsp";
                        echo "<a href='../controller/controllerCliente.php?opcao=4&id=".$cliente->id_cliente."'>Excluir</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>