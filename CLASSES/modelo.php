<?php
    class Bebidas
    {
        public $id_bebida;
        public $nome;
        public $volume;
        public $preco;
        public $peso;
        public $qde_estoque;
        public $fabricante;

        public function Bebidas($no,$vo,$pre,$pe,$qtd,$fabr){
            $this->nome=$no;
            $this->volume=$vo;
            $this->preco=$pre;
            $this->peso=$pe;
            $this->nome=$no;
            $this->qde_estoque=$qtd;
            $this->fabricante=$fabr;
       }

       public function getId_Bebida(){
           return $this->id_bebida;
       }
       public function getNome(){
        return $this->nome;

       }
       public function getPreco(){
        return $this->preco;
       }
       public function getPeso(){
        return $this->peso;
       }
       public function getQtdEstoque(){
        return $this->qde_estoque;
       }
       public function getFabricante(){
        return $this->fabricante;
       }

    }
?>