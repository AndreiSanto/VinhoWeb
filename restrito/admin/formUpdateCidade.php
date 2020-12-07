<?php
    session_start();
    $cidade = $_SESSION["cidade"];
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Cadastro de Cidade</title>
    </head>

    <body>
        <form method="POST" action="../../controller/controllerCidade.php">
            <div>
                <label for="nome">Cidade</label>
                <input type="text" name="nome" value="<?php echo $cidade->cidade ?>" required/>
            </div>
            <div>
                <label for="estado">Estado</label>
                <input type="text" name="estado" value="<?php echo $cidade->estado ?>" required/>
            </div>
            <div>
                <label for="CEP">CEP</label>
                <input type="text" name="CEP" value="<?php echo $cidade->CEP ?>" required/>
            </div>
            <div>
                <label for="valorFrete">Valor do frete/peso</label>
                <input type="text" name="valorFrete" value="<?php echo $cidade->valorfrete_porPeso ?>" required/>
            </div>
            <div>
                <label for="peso">Peso</label>
                <input type="text" name="peso" value="<?php echo $cidade->peso ?>" required/>
            </div>
            <div>
                <input type="submit" value="Editar"/>
                <input type="reset" value="Limpar"/>
            </div>
            <a href='../../controller/controllerCidade.php?opcao=2'>Exibir Cidades</a>
            <div>
                <input type="hidden" name="opcao" value="5"/>
                <input type="hidden" name="id" value="<?php echo $cidade->id_cidade ?>"/>
            </div>
        </form>
    </body>
</html>