<?php
//Criar a coneão com o banco de dados
try{
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
    $conn = new PDO("mysql:host=localhost:3306;dbname=mercado_bd",'chico','chic@oSQL2020',$opcoes);
    $conn->beginTransaction();

}catch(exception $ex){
    echo $ex->getMessage();
}

try{
    
    //Criar a variael que vai conter o objeto de estanciamento do esquema do banco de dados

    $stamt = $conn -> prepare("INSERT INTO tb_tipofornecedor (CodTipoFornecedor,Descricao) values (:TIPOFORN,:DESCR)");

    //CIAÇÃO DAS VARIAVEIS QUE VAI ALIMENTAR  OS PARAMENTROS DO COMANDO SQL

    /*$codTipo='AE';
    $descricao='Auto Escola';

    $codTipo='S';
    $descricao='Supermercado';

    $codTipo='SM';
    $descricao='Supermercado & Magazine';

    $codTipo='F';
    $descricao='Farmácia';

    $codTipo='LMC';
    $descricao='Loja Materiais de Constução';

    $codTipo='LI';
    $descricao='Loja de Informatica';

    $codTipo='PC';
    $descricao='Posto de Combustível';*/
    $codTipo='AR';
    $descricao='Armarinho';

    // Vincular as variáveis com os parametros do campo sql

    $stamt->bindvalue(':TIPOFORN',$codTipo);
    $stamt->bindValue(':DESCR',$descricao);

    $stamt->execute();
    $conn->commit();
}catch(exception $error){
    echo $error->getMessage();
    $conn->rollback();
}

?>