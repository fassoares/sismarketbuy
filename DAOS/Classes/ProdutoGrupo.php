<?php
class ProdutoGrupo {
    private $IdProdutoGrupo;
    private $Descricao;

    //Criar acesso aos atributos da cleasse, os GET informa o valor & SET recebe o valor

    //Campo IDProduto
    public function getIdProdutoGrupo(){
        return $this->IdProdutoGrupo;
    } 
    public function setIdProdutoGrupo($value){
        $this->IdProdutoGrupo = $value;
    }

    //campo descricão
    public function getDescricao(){
        return $this->Descricao;
    }
    public function setDescricao($value){
        return $this->Descricao = $value;
    }

    public function setData($data){
            $this->setIdProdutoGrupo($data['IdProdutoGrupo']);
            $this->setDescricao($data['Descricao']);
    }
    public function loadById($Id){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.IdProdutoGrupo,t1.Descricao from tb_ProdutosGrupos t1 where t1.idProdutoGrupo = :ID", array(
            ":ID"=>$Id
        ));
        if (count($results) > 0){
            $this->setData($results[0]);            
        }
    }
    public static function getListProdutoGrupo(){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.IdProdutoGrupo,t1.Descricao from tb_ProdutosGrupos t1 order by descricao");
        return $results;
    }
    public function searchProdutGrupo($desc){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.IdProdutoGrupo,t1.Descricao from tb_ProdutosGrupos t1 where t1.descricao like :SEARCH order by t1.descricao", array(
            ':SEARCH'=>"%".$desc."%") );
        return $results;
    }
    public function insertProdutoGrupo(){
        $sql= new Sql();
        $results = $sql -> selectSQL(" CALL SPInsertProdutosGrupos(           
            :DESCRICAO)", array(':DESCRICAO'=>$this->getDescricao()));

            if(count($results) > 0){
                $this->setData($results[0]);
            }
    }

    public function AlterProdutGrupo($IdProdutoGrupo,$Descricao){
        
        $classProduto = new ProdutoGrupo;
        $sql= new Sql();
        try {
            $sql->query("update tb_ProdutosGrupos set Descricao=:DESCRICAO where IdProdutoGrupo=:ID",array(
                ':ID'=>$IdProdutoGrupo,  
                ':DESCRICAO'=>$Descricao
            ));
             $classProdutoGrupo->loadById($IdProdutoGrupo);
             echo($classProdutoGrupo);

        } catch (exception $ex){
                echo $ex->getMessage();
        }

    }
    public function DelProdutGrupo($IdProdutoGrupo,$Descricao){
        $sql = new Sql();
        $classProdutoGrupo = new ProdutoGrupo();
        try{
            $sql->query("DELETE FROM tb_ProdutoGrupo WHERE IdProduto=:ID",array(
                ':ID'=>$IdProdutoGrupo
            ));
            echo "Você acabou de deletar da base dadados o registro ". $IdProdutoGrupo."-".$Descricao;

        } catch (exception $ex){
                echo $ex->getMessage();
        }
    }

    public function __construct( $IdProdutoGrupo = "",$Descricao = ""){
        if($IdProdutoGrupo <>""){
            $this->setIdProduto($IdProdutoGrupo);
        }
        $this->setDescricao($Descricao);

    }
    public function __toString(){
        return json_encode(array(
            "ID " => $this->getIdProdutoGrupo(),
            "Grupo " => $this->getDescricao()
            
        ));
    }
}


?>