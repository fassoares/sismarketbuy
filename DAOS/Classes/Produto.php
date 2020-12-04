<?php
class Produto {
    private $IdProduto;
    private $Descricao;
    private $Codigo;
    private $IdProdutoGrupo;
    private $IdProdutoUnidade;
    private $ProdutoGrupoDesc;
    private $ProdutoUnidadeDesc;

    //Criar acesso aos atributos da cleasse, os GET informa o valor & SET recebe o valor

    //Campo IDProduto
    public function getIdProduto(){
        return $this->IdProduto;
    } 
    public function setIdProduto($value){
        $this->IdProduto = $value;
    }

    //campo descricão
    public function getDescricao(){
        return $this->Descricao;
    }
    public function setDescricao($value){
        return $this->Descricao = $value;
    }

    //campo Codigo
    public function getCodigo(){
        return $this->Codigo;        
    }
    public function setCodigo($value){
        return $this->Codigo = $value;
    }

    //campo IdProdutoGrupo
    public function getIdProdutoGrupo(){
        return $this->IdProdutoGrupo;
    }
    public function setIdProdutoGrupo($value){
        return $this->IdProdutoGrupo = $value;
    }

    //campo IdProdutoUnidade
    public function getIdProdutoUnidade(){
        return $this->IdProdutoUnidade;
    }
    public function setIdProdutoUnidade($value){
        return $this->IdProdutoUnidade = $value;
    }

    //campo ProdutoGrupoDesc
    public function getProdutoGrupoDesc(){
        return $this->ProdutoGrupoDesc;
    }  
    public function setIdEndereco($value){
        return $this->ProdutoGrupoDesc = $value;
    }

    //Campo ProdutoUnidadeDesc descricao da unidade do produto
    public function getProdutoUnidadeDesc(){
        return $this->ProdutoUnidadeDesc;
    }
    public function setProdutoUnidadeDesc($value){
        return $this->ProdutoUnidadeDesc = $value;
    }

    public function setData($data){
            $this->setIdProduto($data['IdProduto']);
            $this->setDescricao($data['Descricao']);
            $this->setCodigo($data['Codigo']);
            $this->setIdProdutoGrupo($data['IdProdutoGrupo']);
            $this->setIdProdutoUnidade($data['IdProdutoUnidade']);
            $this->setProdutoGrupoDesc($data['ProdutoGrupoDesc']);
            $this->setProdutoUnidadeDesc($data['ProdutoUnidadeDesc']);

    }
    public function loadById($Id){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.IdProduto,t1.Descricao,t1.Codigo,t1.IdProdutoGrupo,t1.IdProdutoUnidade,InscMunicipal,t1.Codigo,t1.Id_ProdutoGrupo,t1.CodTipoProduto,t1.Id_Endereco,t2.Descricao ProdutoGrupoDesc 
        from tb_Produto t1 left join tb_TipoProduto T2 on t1.id_ProdutoGrupo=t2.id_ProdutoGrupo where t1.id_Produto = :ID", array(
            ":ID"=>$Id
        ));
        if (count($results) > 0){
            $this->setData($results[0]);            
        }
    }
    public static function getListProduto(){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.Id_Produto,t1.Descricao,t1.NmFantasia,t1.Codigo,t1.InscEstadual,InscMunicipal,t1.Codigo,t1.Id_ProdutoGrupo,t1.CodTipoProduto,t1.Id_Endereco,t2.Descricao ProdutoGrupoDesc 
        from tb_Produto t1 left join tb_TipoProduto T2 on t1.id_ProdutoGrupo=t2.id_ProdutoGrupo");
        return $results;
    }
    public function searchProduto($desc){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.Id_Produto,t1.Descricao,t1.NmFantasia,t1.Codigo,t1.InscEstadual,InscMunicipal,t1.Codigo,t1.Id_ProdutoGrupo,t1.CodTipoProduto,t1.Id_Endereco,t2.Descricao ProdutoGrupoDesc 
        from tb_Produto t1 left join tb_TipoProduto T2 on t1.id_ProdutoGrupo=t2.id_ProdutoGrupo where t1.descricao like :SEARCH order by t1.descricao", array(
            ':SEARCH'=>"%".$desc."%") );
        return $results;
    }
    public function insertProduto(){
        $sql= new Sql();
        $results = $sql -> selectSQL(" CALL SPInsertProduto(           
            :DESCRICAO,
            :Codigo,
            :IDProdutoGrupo,
            :CODTIPOProduto,
            :IDENDERECO,
            :NMFANTASIA,
            :INSCESTADUAL,
            :INSCMUNICIPAL)", array(
                ':DESCRICAO'=>$this->getDescricao(),
                ':Codigo'=>$this->getCodigo(),
                ':IDProdutoGrupo'=>$this->getIdProdutoGrupo(),
                ':CODTIPOProduto'=>$this->getIdProdutoUnidade(),
                ':IDENDERECO'=>$this->getIdEndereco(),
                ':NMFANTASIA'=>$this->getNmFantasia(),
                ':INSCESTADUAL'=>$this->getInscEstadual(),
                ':INSCMUNICIPAL'=>$this->getInscMunicipal()
            ));

            if(count($results) > 0){
                $this->setData($results[0]);
            }
    }

    public function AlterProduto($IdProduto,$Descricao,$Codigo,$Id_ProdutoGrupo,$CodTipoProduto,$Id_Endereco,$NmFantasia,$InscEstadual,$InscMunicipal){
        
        $classProduto = new Produto;
        $sql= new Sql();
        try {
            $sql->query("update tb_Produto set Descricao=:DESCRICAO,Codigo=:Codigo,Id_ProdutoGrupo=:IDProdutoGrupo, NmFantasia=:FANTASIA,InscEstadual=:ESTADUAL,InscMunicipal=:MUNICIPAL where Id_Produto=:ID",array(
                ':ID'=>$IdProduto,  
                ':DESCRICAO'=>$Descricao, 
                ':Codigo'=>$Codigo,
                ':IDProdutoGrupo'=>$Id_ProdutoGrupo,
                ':FANTASIA'=>$NmFantasia,
                ':ESTADUAL'=>$InscEstadual,
                ':MUNICIPAL'=>$InscMunicipal
            ));
             $classProduto->loadById($IdProduto);
             echo($classProduto);

        } catch (exception $ex){
                echo $ex->getMessage();
        }

    }
    public function DelProduto($Id_Produto,$Descricao,$Codigo,$NmFantasia){
        $sql = new Sql();
        $classProduto = new Produto();
        try{
            $sql->query("DELETE FROM tb_Produto WHERE Id_Produto=:ID",array(
                ':ID'=>$Id_Produto
            ));
            echo "Você acabou de deletar da base dadados o registro ". $Id_Produto."-".$Descricao.", Codigo: ".$Codigo." Produto: ".$NmFantasia;

        } catch (exception $ex){
                echo $ex->getMessage();
        }
    }

    public function __construct( $Id_Produto = "",$Descricao = "",$Codigo = "",$Id_ProdutoGrupo = "",$CodTipoProduto = "",$Id_Endereco = "",$NmFantasia="",$InscEstadual="",$InscMunicipal="",$ProdutoGrupoDesc= ""){
        if($Id_Produto <>""){
            $this->setIdProduto($Id_Produto);
        }
        $this->setDescricao($Descricao);
        $this->setCodigo($Codigo);
        $this->setIdProdutoGrupo($Id_ProdutoGrupo);
        $this->setIdProdutoUnidade($CodTipoProduto);
        $this->setIdEndereco($Id_Endereco);
        $this->setProdutoGrupoDesc($ProdutoGrupoDesc);
        $this->setNmFantasia($NmFantasia);
        $this->setInscEstadual($InscEstadual);
        $this->setInscMunicipal($InscMunicipal);

    }
    public function __toString(){
        return json_encode(array(
            "ID " => $this->getIdProduto(),
            "Produto " => $this->getDescricao(),
            "Nome Fantasia "=>$this->getNmFantasia(),
            "Codigo " => $this->getCodigo(),
            "Insc. Estadual "=> $this->getInscEstadual(),
            "Insc. Municipal "=> $this->getInscMunicipal(),
            "Tipo " =>$this->getIdProdutoUnidade()."-".$this->getIdProdutoGrupo().": ".$this->getProdutoGrupoDesc(),
            "Endereco "=>$this->getIdEndereco()
            
        ));
    }
}


?>