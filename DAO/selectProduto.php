<?php
require_once("config.php");
$sql = new Sql();
$fornecedor =$sql->selectSQL("SELECT * FROM tb_fornecdor");
echo json_encode($fornecedor);

?>