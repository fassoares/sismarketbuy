<?php
/* echo htmlspecialchars($_POST['txtFornecedor']);   
echo ", ".htmlspecialchars($_POST['txtCNPJ']);
echo ", ".htmlspecialchars($_POST['txtIdEndereco']);
echo ", ".htmlspecialchars($_POST['txtNomeFantasia']);
echo ", ".htmlspecialchars($_POST['txtInscEstadual']);
echo ", ".htmlspecialchars($_POST['txtInscMunicipal']);
echo ", ".htmlspecialchars($_POST['seltipoForn']); 

$Id_Fornecedor = "",$Descricao = "",$CNPJ = "",$Id_TipoForn = "",$CodTipoFornecedor = "",$Id_Endereco = "",$TipoFornDesc= "",$NmFantasia="",$InscEstadual="",$InstMunicipal=""
$fornecedor = new Fornecedor("","Drogaria Modena LTDA ME","28525600000192",13,"F",0,"");
$fornecedor = new Fornecedor("","Nazaré Comercio de Alimentos Magazine LTDA","05205463000103",12,"SM",0,"");
$fornecedor = new Fornecedor("","Importadora Oplima LTDA","04945481000169",15,"LMC",0,"Oplima","150017529","","");
$fornecedor = new Fornecedor("","LIDER CANUDOS - Lider comercio e industria LTDA","05054671001805",12,"SM",0,"LIDER CANUDOS","152156259","00000","");
$fornecedor = new Fornecedor("","LIDER PCA BRASIL - Lider comercio e industria LTDA","05054671000906",12,"SM",0,"LIDER PCA BRASIL","151864470","00000","");
$fornecedor = new Fornecedor("","Accesso Informatica","058647640001",16,"LI",0,"Acesso informatica","15000000","00000","");
$fornecedor = new Fornecedor("","Posto Humaita LTDA","04319281000109",16,"PC",0,"Posto Humaita","151012490","00000","");
$fornecedor = new Fornecedor("","Freira Caldas & Caldas LTDA ME","09200096000106",16,"LI",0,"Confraria Eletronica","152670530","00000","");
$fornecedor = new Fornecedor("","BELLLUZ COM DE M E E DE CONST EIRELE PP","15326333000182",15,"LMC",0,"BELLUZ","151326800","00000","");
$fornecedor = new Fornecedor("","P P N DA SILVA - ME","34829796000101",16,"LI",0,"PEDRÃO Peças e assessórios para motos","151511985","00000","");
$fornecedor = new Fornecedor("","Dicasa Comércio de matariais de Construção LTDA","07013648000303",15,"LMC",0,"diCasa","1527522978","00000","");
$fornecedor = new Fornecedor("","Tapajos Comércio de Medicamentos LTDA","84521053007231",13,"F",0,"Santo Remédio Drogaria","156148390","00000","");
$fornecedor = new Fornecedor("","Muiraquitã Comércio de Materiais de Construção LTDA ME","03619584000176",15,"LMC",0,"Muiraquitã","152091475","00000","");
echo($fornecedor);*/



require_once("config.php");
$idTipoFornecedor = substr(htmlspecialchars($_POST['seltipoForn']),0,strpos(htmlspecialchars($_POST['seltipoForn']),"-"));
$codTipoFornecedor = substr($_POST['seltipoForn'],strpos($_POST['seltipoForn'],"-")+1);
$fornecedor = new Fornecedor("",htmlspecialchars($_POST['txtFornecedor']),htmlspecialchars($_POST['txtCNPJ']),$idTipoFornecedor,$codTipoFornecedor,htmlspecialchars($_POST['txtIdEndereco']),htmlspecialchars($_POST['txtNomeFantasia']),htmlspecialchars($_POST['txtInscEstadual']),htmlspecialchars($_POST['txtInscMunicipal']),""); 
$fornecedor->insertFornecedor();

/* $sql = new Sql();
$fornec = $fornecedor->getListFornecedor(); */
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset = "utf-8"> <!--conjunto de caracter com  os caracteres especiais do portugues brasil-->
        <!-- <link rel="stylesheet" type = "text/css" href="Css/style.css"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS -->
        <link rel="stylesheet" type = "text/css" href="../bootstrap337/Css/bootstrap.min.css">
        <link rel="stylesheet" type = "text/css" href="../bootstrap337/Css/bootstrap-theme.min.css">

         <title>Lista Fornecedor</title>
    </head>
    <body class="container">
        <header>
            <h1 class="text-center text-uppercase">Lista Fornecedor</h1>
        </header>
        <div>
            <table class = "table table-striped table-bordered table_hover">
                <tr>
                    <td>Id</td>
                    <td>Descricao</td>
                    <td>CNPJP</td>
                    <td>Tipo Fornecedor</td>
                    <td>Código</td>
                    <td>Fantasia</td>
                    <td>Insc. Estadual</td>
                    <td>Insc. Municipal</td>
                </tr>
                <?php
                    echo var_dump ($fornecedor);
                   foreach($fornecedor as $fornecedores) {
                ?>
                <tr>
                    <td><?php echo $fornecedores['Id_Fornecedor']; ?></td>
                    <td><?php echo $fornecedores['Descricao']; ?></td>
                    <td><?php echo $fornecedores['CNPJ']; ?></td>
                    <td><?php echo $fornecedores['Id_TipoForn'];?></td>
                    <td><?php echo $fornecedores['CodTipoFornecedor'];?></td>
                    <td><?php echo $fornecedores['NmFantasia'];?></td>                    
                    <td><?php echo $fornecedores['InscEstadual'];?></td>                
                    <td><?php echo $fornecedores['InscMunicipal'];?></td>
                </tr>  
                <?php }?>             
            </table>
                    
        </div>
         <footer>
            <script src="../bootstrap337/js/jquery.js" type = "text/javascript"></script>
            <script src="../bootstrap337/js/bootstrap.min.js" type = "text/javascript"></script>
        </footer>
    </body>
</html>
