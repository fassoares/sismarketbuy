<?php
require_once("config.php");

$classFornecedor = new Fornecedor();
$classFornecedor->loadById(28);
echo $classFornecedor;
$Id_Fornecedor = $classFornecedor->getIdFornecedor();
$Descricao = $classFornecedor->getDescricao();
$CNPJ = $classFornecedor->getCNPJ();
$NmFantasia = $classFornecedor->getNmFantasia();
$classFornecedor-> DelFornecedor($Id_Fornecedor,$Descricao,$CNPJ,$NmFantasia);

?>