<?php
try{
    // $conn = new PDO('mysql:dbname=mercado_bd;host=localhost:3306','chico','chic@oSQL2020'); // conecatar com mysql
    $conn = new PDO('sqlsrv:DataBase=mercado;server=localhost\sqlexpress;ConnectionPooling=0','chico','basedadossql'); // conecatar com mysql
   
    echo "Conexão com sucesso!<br/> ";
}
catch(exception $ex){
    echo $ex->getMessage();
}

$stantment = $conn->prepare("SELECT * FROM TIPOFORNECEDOR ORDER BY DESCRICAO");
$stantment->execute();
$result = $stantment->fetchAll(pdo::FETCH_ASSOC);

foreach($result as $row){
    foreach ($row  as $key=>$value){
        echo "<strong> ".$key.": </strong>". $value. "<br/>";
    }
    echo "_____________________________________________________<br/>";
}
?>

<?php
    
