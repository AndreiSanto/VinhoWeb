<?php
    class Cliente{
        private $id;
        private $nome;
        private $cnpj;
        private $endereco;
        private $id_cidade;

        public function Cliente($nome, $cnpj, $endereco, $id_cidade){
            $this->nome = $nome;
            $this->cnpj = $cnpj;
            $this->endereco = $endereco;
            $this->id_cidade = $id_cidade;
        }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getCNPJ(){
            return $this->cnpj;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function getIdCidade(){
            return $this->id_cidade;
        }
    }
?>