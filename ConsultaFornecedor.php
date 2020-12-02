<?php 

echo "________________________________________________________________________<br>" ;
try{
    $conn = new PDO("mysql:dbname=mercado_bd;host=localhost:3306 ",'chico','chic@oSQL2020');
    echo "<br> Conectado com a base de dados MERCADO_DB! Consulta na tabela Fornecedor</br>";
}catch(Exception $ex){
    echo $ex->getMessage();
}
echo "________________________________________________________________________<br>" ;

$stmtz = $conn->prepare("SELECT * FROM tb_fornecedor ORDER BY descricao");
$stmtz ->execute();
$resulta =$stmtz->fetchAll(pdo::FETCH_ASSOC);

echo "<br/><div>" ;
foreach ($resulta as $row){
    foreach($row as $key=>$value){
        echo "<strong>".$key ."</strong>: ".$value."<br>";
    }
   echo "_____________________________________________________________________<br>" ;
}
echo " </div>";

?>