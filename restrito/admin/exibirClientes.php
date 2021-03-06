<?php
include_once "../../dao/cidadeDao.php";

session_start();
$clientes = $_SESSION["clientes"];
$cidadeDao = new CidadeDao();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Clientes Cadastrados - Bebidas Web Design</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../../images/logo.png" alt="Logo" width="125px">
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="../admin/formCidade.php">Cadastrar Cidade</a></li>
                        <li><a href="../../controller/controllerCidade.php?opcao=2">Exibir Cidades</a></li>
                        <li><a href="../../controller/controllerCliente.php?opcao=1">Cadastrar Cliente</a></li>
                        <li><a href="../../controller/controllerCliente.php?opcao=2">Exibir Clientes</a></li>
                        <li><a href="../admin/formBebida.php">Cadastrar Bebida</a></li>
                        <li><a href="../../controller/controllerBebida.php?opcao=2">Exibir Bebidas</a></li>
                    </ul>
                </div>
                <a href="../../controller/controllerCarrinho.php?opcao=3"><img src="../../images/carrinhoDeCompra.png" alt="Carrinho" width="30px" height="30px"></a>
                <img src="../../images/menu-icon.png" alt="Menu" width="30px" height="30px" class="menu-icon">
            </div>
        </div>

        <div class="container" align="center">
            <!--Carrinho aqui -->
            <table align="center" cellspacing="1" cellpadding="5">
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
                    foreach ($clientes as $cliente) {
                        echo "<tr align='center'>";
                        echo "<td>" . $cliente->id_cliente . "</td>";
                        echo "<td>" . $cliente->nome . "</td>";
                        echo "<td>" . $cliente->cnpj . "</td>";
                        echo "<td>" . $cliente->endereco . "</td>";
                        echo "<td>" . $cidadeDao->getNomeCidade($cliente->id_cidade) . "</td>";
                        echo "<td><a href='../../controller/controllerCliente.php?opcao=5&id=" . $cliente->id_cliente . "'>Editar</a>&nbsp";
                        echo "<a href='../../controller/controllerCliente.php?opcao=4&id=" . $cliente->id_cliente . "'>Excluir</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="linha-3">
                <div class="colunas-4">
                    <h3>Navegação</h3>
                    <ul>
                        <li><a href="../../index.html">Principal</a></li>
                        <li><a href="#">Noticias</a></li>
                        <li><a href="../../controller/controllerOfertas.php?opcao=1">Bebidas</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="../../sobre.html">Sobre</a></li>
                        <li><a href="../../controller/controllerCarrinho.php?opcao=3">Carrinho</a></li>
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
                        <img src="../../images/app.png" alt="app">
                    </div>
                </div>
            </div>
            <hr>
            <p class="copyright">Todos os direitos reservados. Jefferson de Moraes Mistura</p>
        </div>
    </div>
</body>

</html>