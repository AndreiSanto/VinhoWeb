<?php
    class ItemCompra{
        private $id_item;
        private $id_bebida;
        private $quantidade;
        private $valorItem;
        private $id_compra;
        
        public function ItemCompra($id_bebida, $quantidade, $valorItem){
            $this->id_bebida = $id_bebida;
            $this->quantidade = $quantidade;
            $this->valorItem = $valorItem;
        }

        public function getIdBebida(){
            return $this->id_bebida;
        }

        public function getValorItem(){
            return $this->valorItem;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }
    }
?>