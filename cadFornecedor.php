<?php

// criar a conexão com o banco de dados
$conn = new PDO("mysql:host=localhost:3306;dbname=mercado_bd","chico","chic@oSQL2020");

// cria o objeto que vai conter a instrução sql para inserir dados na tabela fornecedor
try{
$stmt = $conn->prepare("INSERT INTO fornecedor (Descricao,CNPJ,Id_tipoForn,codTipofornecedor,id_endereco) values(:DESCR,:cnpj,:IDTIPO,:CODTIPO,:IDEND)");

// faz ligação dos parametros da instrução values do comando insert com o valor que será inserido na tabela correspondente ao campo

/*$descricao ='Centro de Formacao de condutores Lebron LTDA';
$CNPJ = '05755342000135';
$idTipo = 1;
$codTipo='AE';
$IdEndereco = 0;

$descricao = "Economico Comercio de Alimentos EIRELI";
$CNPJ = "06957694000489";
$idTipo = 1;
$codTipo='S';
$IdEndereco = 0;

$descricao = "Drogasil";
$CNPJ = "61585865193871";
$idTipo = 2;
$codTipo='F';
$IdEndereco = 0;

$descricao ='Imifarma Produtos Farmaceuticos e Cosmeticos S.A';
$CNPJ = '04899316012205';
$idTipo = 2;
$codTipo='F';
$IdEndereco = 0;

$descricao ='Formosa Supermercado e Magazine';
$CNPJ = '63864771000147';
$idTipo = 12;
$codTipo='SM';
$IdEndereco = 0;

$descricao ='LIDER PEDREIRA - Lider comercio e industria LTDA';
$CNPJ = '05054671002798';
$idTipo = 12;
$codTipo='SM';
$IdEndereco = 0;*/
// conecta a variavel com os paramentos da instrução values do comando insert
$stmt->bindParam(":DESCR", $descricao);
$stmt->bindParam(":cnpj",$CNPJ);
$stmt->bindParam(":IDTIPO",$idTipo);
$stmt->bindParam(":CODTIPO",$codTipo);
$stmt->bindParam(":IDEND",$IdEndereco);

// executa o comando para inserir os dados no banco
$stmt->execute();
// finaliza a inclusão de dados com a mensagem impressa na tela de operação executada com sucesso!
echo "operação executada com sucesso!<br>";
}
catch(exception $ex){
    echo $ex->getMessage();
}
// listar os dados da tabela fornecedor

$stmtz = $conn->prepare("SELECT * FROM fornecedor ORDER BY descricao");
$stmtz ->execute();
$resulta =$stmtz->fetchAll(pdo::FETCH_ASSOC);

echo "<br/><div>" ;
echo "_____________________________________________________________________<br>" ;
foreach ($resulta as $row){
    foreach($row as $key=>$value){
        echo "<strong>".$key ."</strong>: ".$value."<br>";
    }
   echo "_____________________________________________________________________<br>" ;
}

echo "</div>";
?>