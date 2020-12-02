<?php
define('DB_HOST'        ,  "DESKTOPCHICAO");
define('DB_USER'        , "sa");
/* define('DB_PASSWORD'    , "chic@oSQL");
define('DB_NAME'        , "MercadoDB"); */
define('DB_PASSWORD'    , "program");
define('DB_NAME'        , "SQLsystem");
define('DB_DRIVER'      , "sqlsrv");

/* define('DB_HOST'        , "mercado_bd");
define('DB_USER'        , "chico");
define('DB_PASSWORD'    , "chic@oSQL2020");
define('DB_NAME'        , "localhost:3306");
define('DB_DRIVER'      , "mysql"); */
 
require_once "Conexao.php";
 
try{
 
    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query("SELECT * FROM Tb_tipofornecedor");
    $produtos   = $query->fetchAll();
 
 }catch(Exception $e){
 
    echo $e->getMessage();
    exit;
 
 }
 
?>
<!DOCTYPE html>
<html>

  <title>Conexão PDO SQL Server</title>
</head>
<body>
  <form> 
        <table border=1>
            <tr>
               <td>ID</td>
               <td>Codigo</td>
               <td>Descrição</td>
            </tr>
            <?php
               foreach($produtos as $produto) {
            ?>
            <tr>
                <td><?php echo $produto['Id_TipoForn']; ?></td>
                <td><?php echo $produto['CodTipoFornecedor']; ?></td>
                <td><?php echo $produto['Descricao']; ?></td>
            </tr>
            <?php
               }
            ?>
        </table>
    </form>
</body>
</html>