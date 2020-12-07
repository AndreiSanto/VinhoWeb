<?php
    session_start();
    $cidades = $_SESSION["cidades"];
    $cliente = $_SESSION["cliente"];
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Cadastro de Cliente</title>
    </head>

    <body>
        <form method="POST" action="../../controller/controllerCliente.php">
            <div>
                <label for="nomeCliente">Nome</label>
                <input type="text" name="nomeCliente" value="<?php echo $cliente->nome ?>" required/>
            </div>
            <div>
                <label for="CNPJCliente">CNPJ</label>
                <input type="text" name="CNPJCliente" value="<?php echo $cliente->cnpj ?>" required/>
            </div>
            <div>
                <label for="enderecoCliente">endereço</label>
                <input type="text" name="enderecoCliente" value="<?php echo $cliente->endereco ?>" required/>
            </div>
            <div>
                <label for="cidadeCliente">Cidade:</label>
                <select name="cidadeCliente">
                    <?php
                        foreach($cidades as $cidade){
                            echo "<option value='".$cidade->id_cidade."'>".$cidade->cidade."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Editar"/>
                <input type="reset" value="Limpar"/>
            </div>
            <a href="../../controller/controllerCliente.php?opcao=3">Exibir Clientes</a>
            <div>
                <input type="hidden" name="opcao" value="6"/>
                <input type="hidden" name="id" value="<?php echo $cliente->id_cliente ?>"/>
            </div>
        </form>
    </body>
</html>