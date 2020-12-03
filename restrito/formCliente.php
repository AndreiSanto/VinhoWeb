<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Cadastro de Cliente</title>
    </head>

    <body>
        <form>
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" required/>
            </div>
            <div>
                <label for="CNPJ">CNPJ</label>
                <input type="text" name="CNPJ" required/>
            </div>
            <div>
                <label for="endereço">endereço</label>
                <input type="text" name="endereço" required/>
            </div>
            <div>
                <label for="cidade">Cidade:</label>
                <select name="cidade">
                </select>
            </div>
            <div>
                <input type="submit" value="Cadastrar"/>
                <input type="reset" value="Limpar"/>
            </div>
        </form>
    </body>
</html>