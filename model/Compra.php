<?php
    class Compra{
        private $idCompra;
        private $idCliente;
        private $dataCompra;
        private $valorTotal;
        private $valorFrete;
        
        public function Compra($idCl,$dataC,$valorT,$valorF){
            $this->idCliente = $idCl;
            $this->dataCompra = $dataC;
            $this->valorTotal = $valorT;
            $this->valorFrete = $valorF;
        }
        public function getIdCliente(){
            return $this->idCliente;
        }
        public function getDataCompra(){
            return $this->dataCompra;
        }
        public function getValorTotal(){
            $this->valorTotal;
        }
        public function getValorFrente(){
           return $this->valorFrete;
        }
        public function getIdCompra(){
            return $this->idCompra;
        }
    
    }
