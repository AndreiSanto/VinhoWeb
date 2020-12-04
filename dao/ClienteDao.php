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

        public function getClientes(){
            $rs = $this->con->query("SELECT * FROM clientes");
            $lista = array();
            while($cliente = $rs->fetch(PDO::FETCH_OBJ)){
                $lista[] = $cliente;
            }
            return $lista;
        }

        public function deleteCliente($id){
            $rs = $this->con->prepare("DELETE FROM clientes WHERE id_cliente = :id");
            $rs->bindValue(":id", $id);
            $rs->execute();
        }

        public function deleteClienteCidade($id){
            $rs = $this->con->prepare("DELETE FROM clientes WHERE id_cidade = :id");
            $rs->bindValue(":id", $id);
            $rs->execute();
        }

        public function getCliente($id){
            $rs = $this->con->prepare("SELECT * FROM clientes WHERE id_cliente = :id");
            $rs->bindValue(":id", $id);
            $rs->execute();
            $cliente = $rs->fetch(PDO::FETCH_OBJ);
            return $cliente;
        }

        public function updateCliente(Cliente $cliente, $id){
            $rs = $this->con->prepare("UPDATE clientes SET nome = :nome, cnpj = :cnpj, endereco=:endereco,
                                       id_cidade = :id_cidade WHERE id_cliente = :id"); 
            $rs->bindValue(":nome", $cliente->getNome());
            $rs->bindValue(":cnpj", $cliente->getCNPJ());
            $rs->bindValue(":endereco", $cliente->getEndereco());
            $rs->bindValue(":id_cidade", $cliente->getIdCidade());
            $rs->bindValue(":id", $id);
            $rs->execute();    
        }
    }
?>