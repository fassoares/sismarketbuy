<?php
require_once("config.php");
$sql = new Sql();
$fornecedor =$sql->selectSQL("SELECT * FROM tb_fornecedor");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"> <!--conjunto de caracter com  os caracteres especiais do portugues brasil-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS -->
        <link rel="stylesheet" type = "text/css" href="../../bootstrap337/Css/bootstrap.min.css">
        <link rel="stylesheet" type = "text/css" href="../../bootstrap337/Css/bootstrap-theme.min.css">
        

        <title>Lista Fornecedor</title>
    </head>
    <body>
        <!--background-color:#BDBDBD;-->
        <div class = "container">
            <header>
                <h1 class="text-center text-uppercase">Lista Fornecedor</h1>
            </header>
        
            <div>
                <!--"table table-condensed table-dark table-striped table-bordered table_hover"-->
                <table class = "table table-condensed table-dark table-striped table-bordered table_hover">
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
        </div>
        <footer>
            <script src="../../bootstrap337/js/jquery.js" type = "text/javascript"></script>
            <script src="../../bootstrap337/js/bootstrap.min.js" type = "text/javascript"></script>
        </footer>
    </body>
</html>