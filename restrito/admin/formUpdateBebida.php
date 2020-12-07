<?php
    session_start();
    $bebida = $_SESSION["bebida"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro  de bebida</title>
</head>
<body>
    <form action="../../controller/controllerBebida.php" method="POST">
        <div>
            <label for="descricao">Descricao</label>
            <input type="text" name="descricao" value = "<?php echo $bebida->nome?>"/>
        </div>
        <div>
            <label for="volume">Volume</label>
            <input type="number" name="volume" value = "<?php echo $bebida->volume?>"/>
        </div>
        <div>
            <label for="preco">Preco</label>
            <input type="number" name="preco" value = "<?php echo $bebida->preco ?>"/>
        </div>
        <div>
            <label for="peso">Peso</label>
            <input type="number" name="peso" value = "<?php echo $bebida->peso ?>" />
        </div>
        <div>
            <label for="qtdEstoque">Quantidade</label>
            <input type="number" name="qtdEstoque" value = "<?php echo $bebida->qde_estoque ?>"/>
        </div>
        <div>
            <label for="fabricante">Fabricante</label>
            <input type="text" name="fabricante" value = "<?php echo $bebida->fabricante ?>" />
        </div>
        <div>
            <input type="hidden" name="opcao" value="5"/>
            <input type="hidden" name="id" value="<?php echo $bebida->id_bebida ?>"/>
        </div>
        <div>
            <input type="submit" value="Editar">
            <input type="reset" value="Limpar">
        </div>
    </form>
</body>
</html>