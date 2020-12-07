<?php
 include_once "conexao.php";
 include_once("../model/Bebida.php");
 class BebidasDao{
     private $con;
     public function BebidasDao(){
         $c =new Conexao();
         $this->con = $c->getConexao();
     }
     public function insertBebida(Bebida $bebida){
        $rs = $this->con->prepare("INSERT INTO bebidas (nome,volume, preco,peso,qde_estoque,fabricante) values(?,?,?,?,?,?)");
        $rs->bindValue(1, $bebida->getNome());
        $rs->bindValue(2, $bebida->getVolume());
        $rs->bindValue(3,$bebida->getPreco());
        $rs->bindValue(4,$bebida->getPeso());
        $rs->bindValue(5,$bebida->getQtdEstoque());
        $rs->bindValue(6,$bebida->getFabricante());
        $rs->execute();
     }

     public function deletarBebida($id){
        $rs = $this->con->prepare("DELETE FROM bebidas WHERE id_bebida = ?");
        $rs->bindValue(1, $id);
        $rs->execute();
     }
     public function updateBebida(Bebida $bebida){
        $rs = $this->con->prepare("UPDATE  bebidas SET nome=?,volume=?, preco=?,peso=?,qde_estoque=?,fabricante=? WHERE id_bebida = ?"); 
         $rs->bindValue(1, $bebida->getNome());
        $rs->bindValue(2, $bebida->getVolume());
        $rs->bindValue(3,$bebida->getPreco());
        $rs->bindValue(4,$bebida->getPeso());
        $rs->bindValue(5,$bebida->getQtdEstoque());
        $rs->bindValue(6,$bebida->getFabricante());
        $rs->bindValue(7,$bebida->getId_Bebida()); 
        $rs->execute();
     }
     public function getBebidas(){
        $rs = $this->con->query("SELECT * FROM bebidas");
        $lista = array();
        while($bebida = $rs->fetch(PDO::FETCH_OBJ)){
            $lista[] = $bebida;
        }
        return $lista;
     }

     public function getBebida($id){
         $rs = $this->con->prepare("SELECT * FROM bebidas WHERE id_bebida = ?");
         $rs->bindValue(1, $id);
         $rs->execute();
         $bebida = $rs->fetch(PDO::FETCH_OBJ);
         return $bebida;
     }
 
 public function ultimoRegistro()
 {
     $rs = $this->con->query("SELECT MAX(id_bebida) as total from bebidas");
     $row = $rs->fetch(PDO::FETCH_OBJ);
     return $row;
 }
}
 ?>