<?php
    include_once "conexao.php";
    include_once "../model/Compra.php";

    class CompraDao{
        private $con;

        public function CompraDao(){
            $c = new Conexao();
            $this->con = $c->getConexao();
        }

        public function insertCompra(Compra $compra){
            $rs = $this->con->prepare("INSERT INTO compras (id_cliente, valor_total, valortotal_frete)
                                       VALUES (:id_cliente, :valor_total, :valor_frete)");
            $rs->bindValue(":id_cliente", $compra->getIdCliente());
            $rs->bindValue(":valor_total", $compra->getValorTotal());
            $rs->bindValue(":valor_frete", $compra->getValorFrete());
            $rs->execute();
        }

    }
?>