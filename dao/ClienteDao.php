<?php
    include_once "conexao.php";

    class ClienteDao{
        private $con;

        public function ClienteDao(){
            $c = new Conexao();
            $this->con = $c->getConexao();
        }

        public function insertCliente(Cliente $cliente){
            $rs = $this->con->prepare("INSERT INTO clientes (nome, cnpj, endereco, id_cidade) 
                                       VALUES (:nome, :cnpj, :endereco, :id_cidade)");
            $rs->bindValue(":nome", $cliente->getNome());
            $rs->bindValue(":cnpj", $cliente->getCNPJ());
            $rs->bindValue(":endereco", $cliente->getEndereco());
            $rs->bindValue(":id_cidade", $cliente->getIdCidade());
            $rs->execute();                       
        }
    }
?>