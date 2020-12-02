<?php
require_once("config.php");
$classProdutoGrupo = new ProdutoGrupo("",htmlspecialchars($_POST['txtDescricao'])); 

$classProdutoGrupo->insertProdutoGrupo();
/* $classProdGrup = new ProdutoGrupo;
$classProdGrup->getListProdutoGrupo();
echo $classProdutoGrupo; */
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset = "utf-8"> <!--conjunto de caracter com  os caracteres especiais do portugues brasil-->
         <link rel="stylesheet" type = "text/css" href="Css/style.css">

         <title>Lista Grupo de Produtos</title>
    </head>
    <body>
        <header>
            <h1>Lista  Grupo de Produtos</h1>
        </header>
        <div>
            <table border=1>
                <tr>
                    <td>Id</td>
                    <td>Grupo</td>
                </tr>
                <?php
                    foreach($classProdutoGrupo as $classProdutosGrupos) {
                ?>
                <tr>
                    <td><?php echo $classProdutosGrupos['ID']; ?></td>
                    <td><?php echo $classProdutosGrupos['Grupo']; ?></td>
                </tr>  
                <?php echo $classProdutosGrupos; }
               ?>             
            </table>
                    
        </div>
    </body>
</html>