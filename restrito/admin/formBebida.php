<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de bebida</title>
</head>

<body>
    <form action="../../controller/controllerBebida.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="descricao">Descricao</label>
            <input type="text" name="descricao" />
        </div>
        <div>
            <label for="volume">Volume</label>
            <input type="number" name="volume" />
        </div>
        <div>
            <label for="preco">Preco</label>
            <input type="number" name="preco" />
        </div>
        <div>
            <label for="peso">Peso</label>
            <input type="number" name="peso" />
        </div>
        <div>
            <label for="qtdEstoque">Quantidade</label>
            <input type="number" name="qtdEstoque" />
        </div>
        <div>
            <label for="fabricante">Fabricante</label>
            <input type="text" name="fabricante" />
        </div>
        
            <label for="imagem">Imagem</label><br>
            <input type="file" name="imagem"/>
        
        <div>
            <input type="hidden" name="opcao" value="1" />
        </div>
        <div>
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </div>
    </form>
</body>

</html>