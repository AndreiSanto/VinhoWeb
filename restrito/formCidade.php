<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Cadastro de Cidade</title>
    </head>

    <body>
        <form>
            <div>
                <label for="nome">Cidade</label>
                <input type="text" name="nome" required/>
            </div>
            <div>
                <label for="estado">Estado</label>
                <input type="text" name="estado" required/>
            </div>
            <div>
                <label for="CEP">CEP</label>
                <input type="text" name="CEP" required/>
            </div>
            <div>
                <label for="valorFrete">Valor do frete/peso</label>
                <input type="text" name="valorFrete" required/>
            </div>
            <div>
                <label for="peso">Peso</label>
                <input type="text" name="peso" required/>
            </div>
            <div>
                <input type="submit" value="Cadastrar"/>
                <input type="reset" value="Limpar"/>
            </div>
        </form>
    </body>
</html>