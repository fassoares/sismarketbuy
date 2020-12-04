<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"> <!--conjunto de caracter com  os caracteres especiais do portugues brasil-->
        <!-- <link rel="stylesheet" type = "text/css" href="Css/style.css"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS -->
        <link rel="stylesheet" type = "text/css" href="../../bootstrap337/Css/bootstrap.min.css">
        <link rel="stylesheet" type = "text/css" href="../../bootstrap337/Css/bootstrap-theme.min.css">

         <title>Cadastro Fornecedor</title>
    </head>
    <body class="container">
        <header>
            <h1 class="text-center text-uppercase">Cadastro Fornecedor</h1>
        </header>
        <div class="form-group">
            <form action = "..\inserirfornecedor.php" method = "post">
            <label for="txtFornecedor">Fornecedor</label>
            <input class="form-control form-control-sm" type = "text" placeholder="Fornecedor" name =cc/>
            <label for ="txtCNPJ">CNPJ:</label>
            <input class="form-control" type = "text"  placeholder="CNPJ" name ="txtCNPJ"/>
            <p>Id Tipo Fornecedor:<input class = "form-control form-control-sm" type = "text"  placeholder="Tipo" name ="txtIdTipoFornecedor"/></p>
            <p>Cod. Tipo Fornecedor:<input class="form-control" type = "text" name ="txtTipoFornecedor"/></p>
            <p>Id Endereço:<input class="form-control" type = "text" name ="txtIdEndereco"/></p>  
            <p>Nome Fantasia:<input class="form-control" type = "text" name ="txtNomeFantasia"/></p>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtInscEstadual">Insc. Estadual:</label>
                <input class="form-control" type = "text" name ="txtInscEstadual"/>
            </div>
            <div class="form-group col-md-6">
                <label for = "txtInscMunicipal">Insc. Municipal:</label>
                <input class="form-control" type = "text" name ="txtInscMunicipal"/>
            </div>
        </div>              
        
        <div>
            <input class="btn btn-primary" type ="submit"/>
        </div>
        </form>

    </body>

    
</html>