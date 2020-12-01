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
    class Cidades{
        public $id_cidade;
        public $cidade;
        public $estado;
        public $CEP;
        public $valor_Frete;
        public $peso;

        public function Cidades($id,$ci,$es,$ce,$valor,$pes){
            $this->id_cidade=$id;
            $this->cidade=$ci;
            $this->estado = $es;
            $this->CEP=$ce;
            $this->valor_Frete=$valor;
            $this->peso=$pes;   
        }
        public function getId_cidade(){
            return $this->id_cidade;
        }
        public function getNomeCidade(){
            return $this->cidade;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function getCep(){
            return $this->CEP;
        }
        public function getValorFret(){
            return $this->valor_Frete;
        }
        public function getPeso(){
            return $this->peso;
        }
    }
        

    

?>