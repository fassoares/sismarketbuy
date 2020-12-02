<?php
try{
    echo"_____________________________________________________________________________<BR>";
     $conn = new PDO('mysql:dbname=mercado_bd;host=localhost:3306','chico','chic@oSQL2020'); // conecatar com mysql
    //$conn = new PDO('sqlsrv:DataBase=mercado;server=localhost\sqlexpress;ConnectionPooling=0','chico','basedadossql'); // conecatar com mysql
    echo "<br> Conectado com a base de dados MERCADO_DB! Consulta na tabela Tipo Fornecedor</br>";
    echo"_____________________________________________________________________________<BR>";
}
catch(exception $ex){
    echo $ex->getMessage();
}

$stantment = $conn->prepare("SELECT * FROM tb_TIPOFORNECEDOR ORDER BY DESCRICAO");
$stantment->execute();
$results = $stantment->fetchAll(PDO::FETCH_ASSOC);
var_dump($results) ;

foreach($results as $row){
    foreach ($row  as $key=>$value){
        echo "<strong> ".$key.": </strong>". $value. "<br/>";
    }
    echo "_____________________________________________________<br/>";
}
?>