<?php
    require_once "conexao.php";
    require_once "../model/ItemCompra.php";

    class ItensCompraDao{
        private $con;

        public function ItensCompraDao(){
            $c = new Conexao();
            $this->con = $c->getConexao();
        }

        public function insertItensCompra(ItemCompra $item){
           
        }
    }
?>