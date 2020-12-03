<?php
    class Cliente{
        private $id;
        private $nome;
        private $cnpj;
        private $endereco;
        private $id_cidade;

        public function Cliente($id, $nome, $cnpj, $endereco, $id_cidade){
            $this->id = $id;
            $this->nome = $nome;
            $this->cnpj = $cnpj;
            $this->endereco = $endereco;
            $this->id_cidade = $id_cidade;
        }
    }
?>