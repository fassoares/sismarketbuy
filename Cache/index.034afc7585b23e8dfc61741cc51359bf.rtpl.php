<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE HTML>

<html lang="pt-br">

    <head>
         <meta charset = "utf-8"> <!--conjunto de caracter com  os caracteres especiais do portugues brasil-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS -->
        <link rel="stylesheet" type = "text/css" href="bootstrap337/Css/bootstrap.min.css">
        <link rel="stylesheet" type = "text/css" href="bootstrap337/Css/bootstrap-theme.min.css">

         <title>Mercado & Estatísiticas</title>
    </head>

    <body class="container">
        <header>
            <div class="Conteiner_head">.
                    <h1>Mercado & Estatísticas</h1>
                </div>
                

            </div>
            
        </header>
        <hr> <!--Cria uma linha horizontal de uma borda a outra da pagina-->
        <div class= "conteiner" >
            <div>
                <div><img src="Imagens\carrinhoPaoFrutas.jpg" height="250pc">
                    <p>
                    <?php echo htmlspecialchars( $Texto1, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </p>
                </div>
                <div>
                    <img src="Imagens\pesquisa.jpg" height="250pc"> 
                    <p>
                    <?php echo htmlspecialchars( $Texto2, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </p></div>
                
                
                    Mais Informações:
                    <div>
                        <ol>
                            <li><a href = "ConsultaFornecedor.php">Mercado</a> </li>
                            <ul>
                                <li>Endereço</li>
                                <li>Tipo fornecedor</li> 
                            </ul>
                            <li>Produtos</li>
                            <li>Preços</li>
                            <li><a href = "Email\sendmail.php">enviar e-mail</a> </li>
                        </ol>
                    </div>
            </div>
        </div>
        <hr> <!--Cria uma linha hotizontal de uma borda a outra da pagina-->
        <footer>
           <div"> <!--<img SRC = "http://localhost/mercado/imagens/transparente.png" height=90> --> 
           <img src="Imagens\trigo.jpg" height="250pc"> 
           <img src="Imagens\verduras.jpg" height="250pc"> 
           </div>
           <hr> <!--Cria uma linha hotizontal de uma borda a outra da pagina-->
           <div id="div_direita">
                <p>
                    Criado por FASS informática e engenharia elétrica, tudo para a automação de seu empreendimento, software e equipamentos.
                </p>
            </div>
        
        <hr>
        </footer>
    </body>
</html>