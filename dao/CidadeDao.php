<?php
    include_once "conexao.php";
    include_once "../model/Cidade.php";

    class CidadeDao{
        private $con;

        public function CidadeDao(){
            $c = new Conexao();
            $this->con = $c->getConexao();
        }

        public function insertCidade(Cidade $cidade){
            $rs = $this->con->prepare("INSERT INTO cidades (cidade, estado, CEP, valorfrete_porPeso, peso)
                                       VALUES (:nomeCidade, :estado, :CEP, :valorFrete, :peso)");
            $rs->bindValue(":nomeCidade", $cidade->getNomeCidade());
            $rs->bindValue(":estado", $cidade->getEstado());
            $rs->bindValue(":CEP", $cidade->getcep());
            $rs->bindValue(":valorFrete", $cidade->getValorFrete());
            $rs->bindValue(":peso", $cidade->getPeso());
            $rs->execute();
        }

        public function getCidades(){
            $rs = $this->con->query("SELECT * FROM cidades");
            
            $lista = array();

            while($cidade = $rs->fetch(PDO::FETCH_OBJ)){
                $lista[] = $cidade;
            }

            return $lista;
        }

        public function deleteCidade($id){
            $rs = $this->con->prepare("DELETE FROM cidades WHERE id_cidade = :id");
            $rs->bindValue(":id", $id);
            $rs->execute();
        }

        public function getCidade($id){
            $rs = $this->con->prepare("SELECT * FROM cidades WHERE id_cidade = :id");
            $rs->bindValue(":id", $id);
            $rs->execute();
            $cidade = $rs->fetch(PDO::FETCH_OBJ);
            return $cidade;
        }

        public function getNomeCidade($id){
            $rs = $this->con->prepare("SELECT * FROM cidades WHERE id_cidade = :id");
            $rs->bindValue(":id", $id);
            $rs->execute();
            $registro = $rs->fetch(PDO::FETCH_OBJ);
            return $registro->cidade;
        }

        public function updateCidade(Cidade $cidade, $id){
            $rs = $this->con->prepare("UPDATE cidades SET cidade = :nomeCidade, estado = :estado,
                                       CEP = :CEP, valorfrete_porPeso = :valorFrete, peso = :peso 
                                       WHERE id_cidade = :id");
                                       
            $rs->bindValue(":nomeCidade", $cidade->getNomeCidade());
            $rs->bindValue(":estado", $cidade->getEstado());
            $rs->bindValue(":CEP", $cidade->getcep());
            $rs->bindValue(":valorFrete", $cidade->getValorFrete());
            $rs->bindValue(":peso", $cidade->getPeso());
            $rs->bindValue(":id", $id);
            $rs->execute();
        }
    }
?>