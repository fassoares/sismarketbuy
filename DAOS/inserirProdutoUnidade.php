<?php
require_once("config.php");
$classProdutoUnidade = new ProdutoUnidade("",htmlspecialchars($_POST['txtDescricao']),htmlspecialchars($_POST['txtCodigo'])); 

$classProdutoUnidade->insertProdutoUnidade();
$sql = new sql;
$classProdUnid = $sql->selectSQL("Select t1.IdProdutoUnidade,t1.Descricao,t1.Codigo from tb_ProdutosUnidades t1 order by descricao");
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset = "utf-8"> <!--conjunto de caracter com  os caracteres especiais do portugues brasil-->
         <link rel="stylesheet" type = "text/css" href="Css/style.css">

         <title>Lista Unidade de Produtos</title>
    </head>
    <body>
        <header>
            <h1>Lista  Unidade de Produtos</h1>
        </header>        
        <div>
            <table border=1>
                <tr>
                    <td>ID</td>
                    <td>Unidade</td>
                    <td>Código</td>
                </tr>
                <?php
                    foreach($classProdUnid as $classProdutosUnidades) {
                ?>
                <tr>
                    <td><?php echo $classProdutosUnidades['IdProdutoUnidade']; ?></td>
                    <td><?php echo $classProdutosUnidades['Descricao']; ?></td>
                    <td><?php echo $classProdutosUnidades['Codigo']; ?></td>
                </tr> 
                <?php }?>             
            </table>
                    
        </div>
    </body>
</html>