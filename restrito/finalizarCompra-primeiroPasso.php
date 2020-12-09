<?php
    require_once "../dao/clienteDao.php";

    $clienteDao = new ClienteDao();
    $clientes = $clienteDao->getClientes();
    $subTotal = $_REQUEST["total"];
    $peso = $_REQUEST["peso"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
</head>
<body>
    <form action="finalizarCompra-segundoPasso.php" method="POST">
        <div>
            <label for="cliente">Cliente: </label>
            <select name="cliente">
            <?php
                foreach($clientes as $cliente){
                    echo "<option value=".$cliente->id_cliente.">".$cliente->nome."</option>";
                }
            ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Continuar"/>
            <button>Voltar</button>
        </div>
        <div>
            <input type="hidden" name="subTotal" value="<?php echo $subTotal ?>"/>
            <input type="hidden" name="peso" value="<?php echo $peso ?>"/>
        </div>
    </form>
    <p>Subtotal: <?php echo $subTotal ?></p>
    <p>Peso: <?php echo $peso ?></p>
</body>
</html>