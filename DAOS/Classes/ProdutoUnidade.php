<?php
class ProdutoUnidade {
    private $IdProdutoUnidade;
    private $Descricao;
    private $Codigo;

    //Criar acesso aos atributos da cleasse, os GET informa o valor & SET recebe o valor

    //Campo IDProduto
    public function getIdProdutoUnidade(){
        return $this->IdProdutoUnidade;
    } 
    public function setIdProdutoUnidade($value){
        $this->IdProdutoUnidade = $value;
    }

    //campo descricão
    public function getDescricao(){
        return $this->Descricao;
    }
    public function setDescricao($value){
        return $this->Descricao = $value;
    }

    //campo Código
    public function getCodigo(){
        return $this->Codigo;
    }
    public function setCodigo($value){
        return $this->Codigo = $value;
    }


    public function setData($data){
            $this->setIdProdutoUnidade($data['IdProdutoUnidade']);
            $this->setDescricao($data['Descricao']);
            $this->setCodigo($data['Codigo']);            
    }
    public function loadById($Id){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.IdProdutoUnidade,t1.Descricao,t1.Codigo from tb_ProdutosUnidades t1 where t1.idProdutoUnidade = :ID", array(
            ":ID"=>$Id
        ));
        if (count($results) > 0){
            $this->setData($results[0]);            
        }
    }
    public static function getListProdutoUnidade(){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.IdProdutoUnidade,t1.Descricao,t1.Codigo from tb_ProdutosUnidades t1 order by descricao");
        return $results;
    }
    public function searchProdutoUnidade($desc){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.IdProdutoUnidade,t1.Descricao,t1.Codigo from tb_ProdutosUnidades t1 where t1.descricao like :SEARCH order by t1.descricao", array(
            ':SEARCH'=>"%".$desc."%") );
        return $results;
    }
    public function insertProdutoUnidade(){
        $sql= new Sql();
        $results = $sql -> selectSQL("CALL SPInsertProdutosUnidades(:DESCRICAO,:CODIGO)", array(':DESCRICAO'=>$this->getDescricao(), ':CODIGO'=>$this->getCodigo()));
            
            if(count($results) > 0){
                $this->setData($results[0]);
            }
    }

    public function AlterProdutoUnidade($IdProdutoUnidade,$Descricao){
        
        $classProduto = new ProdutoUnidade;
        $sql= new Sql();
        try {
            $sql->query("update tb_ProdutosUnidades set Descricao=:DESCRICAO,Codigo=:CODIGO where IdProdutoUnidade=:ID",array(
                ':ID'=>$IdProdutoUnidade,  
                ':DESCRICAO'=>$Descricao,
                ':CODIGO'=>$Codigo
            ));
             $classProdutoUnidade->loadById($IdProdutoUnidade);
             echo($classProdutoUnidade);

        } catch (exception $ex){
                echo $ex->getMessage();
        }

    }
    public function DelProdutoUnidade($IdProdutoUnidade,$Descricao){
        $sql = new Sql();
        $classProdutoUnidade = new ProdutoUnidade();
        try{
            $sql->query("DELETE FROM tb_ProdutoUnidade WHERE IdProduto=:ID",array(
                ':ID'=>$IdProdutoUnidade
            ));
            echo "Você acabou de deletar da base dadados o registro ". $IdProdutoUnidade."-".$Descricao;

        } catch (exception $ex){
                echo $ex->getMessage();
        }
    }

    public function __construct( $IdProdutoUnidade = "",$Descricao = "",$Codigo=""){
        if($IdProdutoUnidade <>""){
            $this->setIdProdutoUnidade($IdProdutoUnidade);
        }
        $this->setDescricao($Descricao);
        $this->setCodigo($Codigo);

    }
    public function __toString(){
        return json_encode(array(
            "ID " => $this->getIdProdutoUnidade(),
            "Unidade " => $this->getDescricao(),
            "Codigo " =>$this->getCodigo()            
        ));
    }
}
?>