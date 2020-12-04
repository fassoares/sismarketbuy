<?php
require_once("config.php");
$sql = new Sql();
$fornecedor =$sql->selectSQL("Select t1.Id_Fornecedor,t1.Descricao,t1.NmFantasia,t1.CNPJ,t1.InscEstadual,InscMunicipal,t1.CNPJ,t1.Id_TipoForn,t1.CodTipoFornecedor,t1.Id_Endereco,t2.Descricao TipoFornDesc 
        from tb_fornecedor t1 left join tb_TipoFornecedor T2 on t1.id_tipoforn=t2.id_tipoForn order by t1.descricao");
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset = "utf-8"> <!--conjunto de caracter com  os caracteres especiais do portugues brasil-->         
        <!-- <link rel="stylesheet" type = "text/css" href="Css/style.css"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS -->
        <link rel="stylesheet" type = "text/css" href="../../bootstrap337/Css/bootstrap.min.css">
        <link rel="stylesheet" type = "text/css" href="../../bootstrap337/Css/bootstrap-theme.min.css">


         <title>Lista Fornecedor</title>
    </head>
    <body>
        <header>
            <h1 class="text-center text-uppercase">Lista Fornecedor</h1>
        </header>
        <div>
            <table class = "table table-condensed table-dark table-striped table-bordered table_hover">
                <tr>
                    <td>Id</td>
                    <td>Descricao</td>
                    <td>CNPJP</td>
                    <td>Código</td>
                    <td>Tipo Fornecedor</td>
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
                    <td><?php echo $fornecedores['CodTipoFornecedor'];?></td>
                    <td><?php echo $fornecedores['TipoFornDesc'];?></td>
                    <td><?php echo $fornecedores['NmFantasia'];?></td>                    
                    <td><?php echo $fornecedores['InscEstadual'];?></td>                
                    <td><?php echo $fornecedores['InscMunicipal'];?></td>
                </tr>  
                <?php }?>             
            </table>                    
        </div>
        <diV><a href="../interfaces/formCadFornecedor.php"><img src="../imagens/simboloadicao.png" width="42" height="46" alt="Incluir"></a></diV>
        <footer>
            <script src="../../bootstrap337/js/jquery.js" type = "text/javascript"></script>
            <script src="../../bootstrap337/js/bootstrap.min.js" type = "text/javascript"></script>
        </footer>
    </body>
</html>
