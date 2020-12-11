<?php
require_once "../dao/clienteDao.php";
require_once "../dao/CidadeDao.php";

$idCliente = $_REQUEST["cliente"];
$subTotal = $_REQUEST["subTotal"];
$peso = $_REQUEST["peso"];
$clienteDao = new ClienteDao();
$cidadeDao = new CidadeDao();
$idCidade = $clienteDao->getCliente($idCliente)->id_cidade;
$valorFrete = $cidadeDao->getCidade($idCidade)->valorfrete_porPeso * $peso;
$valorTotal = $subTotal + $valorFrete;
$idBebida = $_REQUEST["idBebida"];
$qtdItem = $_REQUEST["qtdItem"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Carrinho - Bebidas Web Design</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../images/logo.png" alt="Logo" width="125px">
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="#">Noticias</a></li>
                        <li><a href="../controller/controllerOfertas.php?opcao=1">Bebidas</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="../login.html">Usuario</a></li>

                    </ul>
                </div>
                <a href="../controller/controllerCarrinho.php?opcao=3"><img src="../images/carrinhoDeCompra.png" alt="Carrinho" width="30px" height="30px"></a>
                <img src="../images/menu-icon.png" alt="Menu" width="30px" height="30px" class="menu-icon">
            </div>
        </div>

        <div class="container">
            <div class="linha">
                <div class="form-container">
                    <p>Nome do cliente: <?php echo $clienteDao->getCliente($idCliente)->nome ?></p>
                    <p>Valor total da compra: <?php echo $valorTotal ?></p>
                    <form action="../controller/controllerCompra.php" method="POST">
                        <input type="hidden" name="bNome" value="<?php echo $clienteDao->getCliente($idCliente)->nome ?>" />
                        <input type="hidden" name="bId" value="<?php echo $idCliente ?>" />
                        <input type="hidden" name="bCnpj" value="<?php echo $clienteDao->getCliente($idCliente)->cnpj ?>" />
                        <input type="hidden" name="bEndereco" value="<?php echo $clienteDao->getCliente($idCliente)->endereco ?>" />
                        <input type="hidden" name="bCep" value="<?php echo $cidadeDao->getCidade($idCidade)->CEP ?>" />
                        <input type="hidden" name="bEstado" value="<?php echo $cidadeDao->getCidade($idCidade)->estado ?>" />
                        <input type="hidden" name="bCidade" value="<?php echo $cidadeDao->getCidade($idCidade)->cidade ?>" />
                        <input type="hidden" name="total" value="<?php echo $valorTotal ?>" />
                        <input type="hidden" name="frete" value="<?php echo $valorFrete ?>" />
                        <input type="hidden" name="idBebida" value="<?php echo $idBebida ?>" />
                        <input type="hidden" name="qtdItem" value="<?php echo $qtdItem ?>" />
                        <input type="hidden" name="opcao" value="1">
                        <input type="submit" value="Finalizar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="linha-3">
                <div class="colunas-4">
                    <h3>Navegação</h3>
                    <ul>
                        <li><a href="../index.html">Principal</a></li>
                        <li><a href="#">Noticias</a></li>
                        <li><a href="../controller/controllerOfertas.php?opcao=1">Bebidas</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="../login.html">Usuario</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="../controller/controllerCarrinho.php?opcao=3">Carrinho</a></li>
                    </ul>
                </div>
                <div class="colunas-4">
                    <h3>Siga-nos</h3>
                    <ul>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Youtube</a></li>
                    </ul>
                </div>
                <div class="colunas-4">
                    <h3>Baixe nosso app</h3>
                    <div class="app-logo">
                        <img src="../images/app.png" alt="app">
                    </div>
                </div>
            </div>
            <hr>
            <p class="copyright">Todos os direitos reservados. Jefferson de Moraes Mistura</p>
        </div>
    </div>
</body>

</html>