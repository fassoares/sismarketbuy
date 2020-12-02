<?php
require_once("config.php");
$sql = new Sql();
$Tpfornecedor =$sql->selectSQL("SELECT id_tipoforn,codTipoFornecedor,descricao FROM tb_tipofornecedor order by descricao");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"> <!--conjunto de caracter com  os caracteres especiais do portugues brasil-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS -->
        <link rel="stylesheet" type = "text/css" href="../../bootstrap337/Css/bootstrap.min.css">
        <link rel="stylesheet" type = "text/css" href="../../bootstrap337/Css/bootstrap-theme.min.css">
        

        <title>Lista Tipo Fornecedor</title>
    </head>
    <body>
        <!--background-color:#BDBDBD;-->
        <div class = "container">
            <header>
                <h1 class="text-center text-uppercase">Lista Tipo Fornecedor</h1>
            </header>
        
            <div>
                <table class = "table table-condensed table-dark table-striped table-bordered table_hover">
                    <tr>
                        <td>Id</td>
                        <td>Código</td>
                        <td>Descricao</td>
                    </tr>
                    <?php
                        foreach($Tpfornecedor as $tipoforns) {
                    ?>
                    <tr>
                        <td><?php echo $tipoforns['id_tipoforn']; ?></td>
                        <td><?php echo $tipoforns['codTipoFornecedor']; ?></td>
                        <td><?php echo $tipoforns['descricao']; ?></td>
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