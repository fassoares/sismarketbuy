<?php
require_once("config.php");

/*
6	Centro de Formacao de condutores Lebron LTDA	05755342000135	1	AE	0			
7	Economico Comercio de Alimentos EIRELI	06957694000489	1	S	0			
8	Drogasil	61585865193871	2	F	0			
9	Imifarma Produtos Farmaceuticos e Cosmeticos S.A	04899316012205	2	F	0			
10	Formosa Supermercado e Magazine	63864771000147	1	SM	0			
11	LIDER PEDREIRA - Lider comercio e industria LTDA	05054671002798	12	SM	0			
12	Drogaria Modena LTDA ME	28525600000192	13	F	0	Farmacia Max Popular	155755927	0000
13	Nazaré Comercio de Alimentos Magazine LTDA	05205463000103	12	SM	0			
14	Importadora Oplima LTDA	04945481000169	15	LMC	0	Oplima	150017529	

'10', 'AE', 'Auto Escola'
'11', 'S', 'Supermercado'
'12', 'SM', 'Supermercado & Magazine'
'13', 'F', 'Farmácia'
'15', 'LMC', 'Loja Materiais de Constução'

Id_Fornecedor = "",$Descricao = "",$CNPJ = "",$Id_TipoForn = "",$Id_Endereco = "",$TipoFornDesc= "",$NmFantasia="",$InscEstadual="",$InstMunicipal="",$CodTipoFornecedor = ""
$fornecedor = new Fornecedor(12,"Drogaria Modena LTDA ME","28525600000192",13,"F",0,"Farmácia Max Popular","155755927","000000","");
$fornecedor = new Fornecedor(13,"Nazaré Coml Alimentos Magazine LTDA","05205463000103",12,"SM",0,"SuperMercado Nazaré","150753764","0260947","");
$fornecedor = new Fornecedor(14,"Importadora Oplima LTDA","04945481000169",15,"LMC",0,"Oplima","150017529","","");*/

$classFornecedor = new Fornecedor();
$classFornecedor->loadById(13);
$Id_Fornecedor = $classFornecedor->getIdFornecedor();
$Descricao = $classFornecedor->getDescricao();
$CNPJ = $classFornecedor->getCNPJ();
$Id_TipoForn = $classFornecedor->getIdTipoForn();
$CodTipoFornecedor = $classFornecedor->getCodTipoForn();
$Id_Endereco = $classFornecedor->getIdEndereco();
$TipoFornDesc = $classFornecedor->getTipoFornDesc();
$NmFantasia = $classFornecedor->getNmFantasia();
$InscEstadual = $classFornecedor->getInscEstadual();
$InscMunicipal = $classFornecedor->getInscMunicipal();

/*$Id_TipoForn = 7;
$NmFantasia = "ECONÔMICO PEDREIRA";
$InscEstadual = "155756745";
$InscMunicipal ="000000";

$Id_TipoForn = 8;
$Descricao ='RAIADROGASIL S.A.';
$NmFantasia = "DROGASIL";
$InscEstadual = "152440410";
$InscMunicipal ="000000";
$Id_TipoForn = 13;


$Id_TipoForn = 9;
$NmFantasia = "EXTRAFARMA";
$InscEstadual = "152440410";
$InscMunicipal ="111111";
$Id_TipoForn = 13;

$Id_TipoForn = 10;
$NmFantasia = "Super FORMASA";
$InscEstadual = "1500000";
$InscMunicipal ="00000000";
$Id_TipoForn = 12;*/

/*$Id_TipoForn = 11;
$NmFantasia = "LIDER PEDREIRA";
$InscEstadual = "152678417";
$InscMunicipal ="000000";*/

$Id_TipoForn = 13;
$NmFantasia = "Supermercado NAZERÉ";
$InscEstadual = "15000000";
$InscMunicipal ="000000";
$classFornecedor-> alterFornecedor($Id_Fornecedor,$Descricao,$CNPJ,$Id_TipoForn,$CodTipoFornecedor,$Id_Endereco,$NmFantasia,$InscEstadual,$InscMunicipal);

?>