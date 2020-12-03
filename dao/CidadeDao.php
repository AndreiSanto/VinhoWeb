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
    }
?>