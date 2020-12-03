<?php
class Cidade{
        private $id_cidade;
        private $nome;
        private $estado;
        private $CEP;
        private $valor_Frete;
        private $peso;

        public function Cidade($nome, $estado, $cep, $valorFrete, $peso){
            $this->nome=$nome;
            $this->estado = $estado;
            $this->CEP=$cep;
            $this->valor_Frete=$valorFrete;
            $this->peso=$peso;   
        }

        public function getId_cidade(){
            return $this->id_cidade;
        }

        public function getNomeCidade(){
            return $this->nome;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function getCep(){
            return $this->CEP;
        }

        public function getValorFrete(){
            return $this->valor_Frete;
        }

        public function getPeso(){
            return $this->peso;
        }
    }
?>