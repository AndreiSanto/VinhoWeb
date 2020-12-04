<?php
    session_start();
    $cidades = $_SESSION["cidades"];
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Cadastro de Cliente</title>
    </head>

    <body>
        <form method="POST" action="../controller/controllerCliente.php">
            <div>
                <label for="nomeCliente">Nome</label>
                <input type="text" name="nomeCliente" required/>
            </div>
            <div>
                <label for="CNPJCliente">CNPJ</label>
                <input type="text" name="CNPJCliente" required/>
            </div>
            <div>
                <label for="enderecoCliente">endereço</label>
                <input type="text" name="enderecoCliente" required/>
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
                <input type="submit" value="Cadastrar"/>
                <input type="reset" value="Limpar"/>
            </div>
            <div>
                <input type="hidden" name="opcao" value="2"/>
            </div>
        </form>
    </body>
</html>