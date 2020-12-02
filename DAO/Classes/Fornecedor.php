<?php
require_once("config.php");
class Fornecedor {
    private $Id_Fornecedor;
    private $Descricao;
    private $CNPJ;
    private $Id_TipoForn;
    private $CodTipoFornecedor;
    private $Id_Endereco;
    private $TipoFornDesc;
    private $NmFantasia;
    private $InscEstadual;
    private $InscMunicipal;


    //Criar acesso aos atributos da cleasse, os GET informa o valor & SET recebe o valor

    //Campo ID_fornecedor
    public function getIdFornecedor(){
        return $this->Id_Fornecedor;
    } 
    public function setIdFornecedor($value){
        $this->Id_Fornecedor = $value;
    }

    //campo descricão
    public function getDescricao(){
        return $this->Descricao;
    }
    public function setDescricao($value){
        return $this->Descricao = $value;
    }

    //campo CNPJ
    public function getCNPJ(){
        return $this->CNPJ;        
    }
    public function setCNPJ($value){
        return $this->CNPJ = $value;
    }

    //campo Id_tipoForn
    public function getIdTipoForn(){
        return $this->Id_TipoForn;
    }
    public function setIdTipoForn($value){
        return $this->Id_TipoForn = $value;
    }

    //campo CodTipoForn
    public function getCodTipoForn(){
        return $this->CodTipoFornecedor;
    }
    public function setCodTipoForn($value){
        return $this->CodTipoFornecedor = $value;
    }

    //campo ID_endereco
    public function getIdEndereco(){
        return $this->Id_Endereco;
    }  
    public function setIdEndereco($value){
        return $this->Id_Endereco = $value;
    }

    //Campo TipoFornDesc descricao do tipo de fornecedor
    public function getTipoFornDesc(){
        return $this->TipoFornDesc;
    }
    public function setTipoFornDesc($value){
        return $this->TipoFornDesc = $value;
    }

    //Campo TipoFornDesc descricao do Nome fantasia
    public function getNmFantasia(){
        return $this->NmFantasia;        
    }
    public function setNmFantasia($value){
        return $this->NmFantasia = $value;        
    }
    
    //Campo TipoFornDesc descricao do Inscricao Estadual
    public function getInscEstadual(){
        return $this->InscEstadual;        
    }
    public function setInscEstadual($value){
        return $this->InscEstadual = $value;        
    }

    //Campo TipoFornDesc descricao do Inscrição Municipal
    public function getInscMunicipal(){
        return $this->InscMunicipal;        
    }
    public function setInscMunicipal($value){
        return $this->InscMunicipal = $value;        
    }
    public function setData($data){
        //Aimenta a classe com os valores
            $this->setIdFornecedor($data['Id_Fornecedor']);
            $this->setDescricao($data['Descricao']);
            $this->setCNPJ($data['CNPJ']);
            $this->setIdTipoForn($data['Id_TipoForn']);
            $this->setCodTipoForn($data['CodTipoFornecedor']);
            $this->setIdEndereco($data['Id_Endereco']);
            $this->setTipoFornDesc($data['TipoFornDesc']);
            $this->setNmFantasia($data['NmFantasia']);
            $this->setInscEstadual($data['InscEstadual']);
            $this->setInscMunicipal($data['InscMunicipal']);

    }
    public function loadById($Id){
        require_once("config.php");
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.Id_Fornecedor,t1.Descricao,t1.NmFantasia,t1.CNPJ,t1.InscEstadual,InscMunicipal,t1.CNPJ,t1.Id_TipoForn,t1.CodTipoFornecedor,t1.Id_Endereco,t2.Descricao TipoFornDesc 
        from tb_fornecedor t1 left join tb_TipoFornecedor T2 on t1.id_tipoforn=t2.id_tipoForn where t1.id_fornecedor = :ID", array(
            ":ID"=>$Id
        ));
        if (count($results) > 0){
            $this->setData($results[0]);            
        }
    }
    public static function getListFornecedor(){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.Id_Fornecedor,t1.Descricao,t1.NmFantasia,t1.CNPJ,t1.InscEstadual,InscMunicipal,t1.CNPJ,t1.Id_TipoForn,t1.CodTipoFornecedor,t1.Id_Endereco,t2.Descricao TipoFornDesc 
        from tb_fornecedor t1 left join tb_TipoFornecedor T2 on t1.id_tipoforn=t2.id_tipoForn");
        return $results;
    }
    public function searchFornecedor($desc){
        $sql = new Sql();
        $results = $sql->selectSQL("Select t1.Id_Fornecedor,t1.Descricao,t1.NmFantasia,t1.CNPJ,t1.InscEstadual,InscMunicipal,t1.CNPJ,t1.Id_TipoForn,t1.CodTipoFornecedor,t1.Id_Endereco,t2.Descricao TipoFornDesc 
        from tb_fornecedor t1 left join tb_TipoFornecedor T2 on t1.id_tipoforn=t2.id_tipoForn where t1.descricao like :SEARCH order by t1.descricao", array(
            ':SEARCH'=>"%".$desc."%") );
        return $results;
    }
    public function insertFornecedor(){
        $sql= new Sql();
        try{
            $results = $sql -> selectSQL(" CALL SPInsertFornecedor(           
                :DESCRICAO,
                :CNPJ,
                :IDTIPOFORN,
                :CODTIPOFORNECEDOR,
                :IDENDERECO,
                :NMFANTASIA,
                :INSCESTADUAL,
                :INSCMUNICIPAL)", array(
                    ':DESCRICAO'=>$this->getDescricao(),
                    ':CNPJ'=>$this->getCNPJ(),
                    ':IDTIPOFORN'=>$this->getIdtipoforn(),
                    ':CODTIPOFORNECEDOR'=>$this->getCodTipoForn(),
                    ':IDENDERECO'=>$this->getIdEndereco(),
                    ':NMFANTASIA'=>$this->getNmFantasia(),
                    ':INSCESTADUAL'=>$this->getInscEstadual(),
                    ':INSCMUNICIPAL'=>$this->getInscMunicipal()
                ));
                if(count($results) > 0){
                    $this->setData($results[0]);
                }
        } catch (exception $ex){
                echo $ex->getMessage();
        }
    }

    public function AlterFornecedor($IdFornecedor,$Descricao,$CNPJ,$Id_TipoForn,$CodTipoFornecedor,$Id_Endereco,$NmFantasia,$InscEstadual,$InscMunicipal){
        
        $classFornecedor = new Fornecedor;
        $sql= new Sql();
        try {
           /* $results = $sql -> selectSQL("CALL SPalterFornecedor(   
            :IDFORNECEDOR        
            :DESCRICAO,
            :CNPJ,
            :IDTIPOFORN,
            :CODTIPOFORNECEDOR,
            :IDENDERECO,
            :NMFANTASIA,
            :INSCESTADUAL,
            :INSCMUNICIPAL)", array(
                ':IDFORNECEDOR'=>$IdFornecedor,
                ':DESCRICAO'=>$Descricao,
                ':CNPJ'=>$CNPJ,
                ':IDTIPOFORN'=>$Id_TipoForn,
                ':CODTIPOFORNECEDOR'=>$CodTipoFornecedor,
                ':IDENDERECO'=>$Id_Endereco,
                ':NMFANTASIA'=>$NmFantasia,
                ':INSCESTADUAL'=>$InscEstadual,
                ':INSCMUNICIPAL'=>$InscMunicipal
            ));
            if(count($results) > 0){
                $this->setData($results[0]);
            }*/

            $sql->query("update tb_fornecedor set Descricao=:DESCRICAO,CNPJ=:CNPJ,Id_TipoForn=:IDTIPOFORN, NmFantasia=:FANTASIA,InscEstadual=:ESTADUAL,InscMunicipal=:MUNICIPAL where Id_Fornecedor=:ID",array(
                ':ID'=>$IdFornecedor,  
                ':DESCRICAO'=>$Descricao, 
                ':CNPJ'=>$CNPJ,
                ':IDTIPOFORN'=>$Id_TipoForn,
                ':FANTASIA'=>$NmFantasia,
                ':ESTADUAL'=>$InscEstadual,
                ':MUNICIPAL'=>$InscMunicipal
            ));
             $classFornecedor->loadById($IdFornecedor);
             echo($classFornecedor);

        } catch (exception $ex){
                echo $ex->getMessage();
        }

    }
    public function DelFornecedor($Id_Fornecedor,$Descricao,$CNPJ,$NmFantasia){
        $sql = new Sql();
        $classFornecedor = new Fornecedor();
        try{
            $sql->query("DELETE FROM tb_fornecedor WHERE Id_Fornecedor=:ID",array(
                ':ID'=>$Id_Fornecedor
            ));
            echo "Você acabou de deletar da base dadados o registro ". $Id_Fornecedor."-".$Descricao.", CNPJ: ".$CNPJ." Fornecedor: ".$NmFantasia;

        } catch (exception $ex){
                echo $ex->getMessage();
        }/* 
        $classFornecedor->loadById($Id_Fornecedor);
        echo($classFornecedor); */

    }

    public function __construct( $Id_Fornecedor = "",$Descricao = "",$CNPJ = "",$Id_TipoForn = "",$CodTipoFornecedor = "",$Id_Endereco = "",$NmFantasia="",$InscEstadual="",$InscMunicipal="",$TipoFornDesc= ""){
        if($Id_Fornecedor <>""){
            $this->setIdFornecedor($Id_Fornecedor);
        }
        $this->setDescricao($Descricao);
        $this->setCNPJ($CNPJ);
        $this->setIdTipoForn($Id_TipoForn);
        $this->setCodTipoForn($CodTipoFornecedor);
        $this->setIdEndereco($Id_Endereco);
        $this->setTipoFornDesc($TipoFornDesc);
        $this->setNmFantasia($NmFantasia);
        $this->setInscEstadual($InscEstadual);
        $this->setInscMunicipal($InscMunicipal);

    }
    public function __toString(){
        return json_encode(array(
            "ID " => $this->getIdFornecedor(),
            "Fornecedor " => $this->getDescricao(),
            "Nome Fantasia "=>$this->getNmFantasia(),
            "CNPJ " => $this->getCNPJ(),
            "Insc. Estadual "=> $this->getInscEstadual(),
            "Insc. Municipal "=> $this->getInscMunicipal(),
            "Tipo " =>$this->getCodTipoForn()."-".$this->getIdtipoforn().": ".$this->getTipoFornDesc(),
            "Endereco "=>$this->getIdEndereco()
            
        ));
    }
}


?>