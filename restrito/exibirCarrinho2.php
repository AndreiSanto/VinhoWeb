<?php
    require_once "../dao/BebidasDao.php";
    require_once "../model/ItemCompra.php";

    $bebidaDao = new BebidasDao();
    session_start();
    $carrinho = $_SESSION["carrinho"];
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
                            <li><a href="#">Usuario</a></li>
                            
                        </ul>    
                    </div>
                    <a href="../controller/controllerCarrinho.php?opcao=3"><img src="../images/carrinhoDeCompra.png" alt="Carrinho" width="30px" height="30px"></a>
                    <img src="../images/menu-icon.png" alt="Menu" width="30px" height="30px" class="menu-icon">
                </div>
            </div>

            <div class="container" align="center">
                <!--Carrinho aqui -->
                    <table align="center" cellspacing="1" cellpadding="5">
                        <tr>
                            <th>INDICE</th>
                            <th>CODIGO</th>
                            <th>DESCRIÇÃO</th>
                            <th>VOLUME</th>
                            <th>PREÇO UN</th>
                            <th>QUANTIDADE</th>
                            <th>FABRICANTE</th>
                            <th>REMOVER</th>
                        </tr>
                            <?php
                                $cont = 0;
                                $soma = 0;
                                $peso = 0;
                                foreach($carrinho as $itemCompra){
                                    $bebida = $bebidaDao->getBebida($itemCompra->getIdBebida());
                                    $cont++;
                                    $soma = $soma + ($itemCompra->getValorItem() * $itemCompra->getQuantidade());
                                    $peso = $peso + ($bebida->peso * $itemCompra->getQuantidade()); 
                                    echo "<tr align='center'>";
                                    echo "<td>".$cont."</td>";
                                    echo "<td>".$itemCompra->getIdBebida()."</td>";
                                    echo "<td>".$bebida->nome."</td>";
                                    echo "<td>".$bebida->volume."</td>";
                                    echo "<td>".$bebida->preco."</td>";
                                    echo "<td>".$itemCompra->getQuantidade()."</td>";
                                    echo "<td>".$bebida->fabricante."</td>";
                                    echo "<td><a href='../controller/controllerCarrinho.php?opcao=2&indice=".$cont."'>remover</a></td>";
                                    echo "</tr>";
                                    
                                }
                                echo "<tr class='total'>";
                                echo "<td colspan='8' align='center' >Total: ".$soma."</td>";
                                echo "</tr>";
                            ?>
                    </table> 
                    <button class="btn-oferta" onclick="location.href='finalizarCompra-primeiroPasso.php?total=<?php echo $soma ?>&peso=<?php echo $peso ?>'">Finalizar Compra</button>
                    <button class="btn-oferta" onclick="location.href='../controller/controllerOfertas.php?opcao=1'">Continuar Comprando</button> 
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
                            <li><a href="#">Usuario</a></li>
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