<?PHP
    require_once("vendor/autoload.php");
    $app = new \Slim\Slim();
    $app->get('/', function () {
        $sql = new Classes\DB\Sql();        
        $results = $sql-> select("SELECT * FROM mercado_bd.tb_fornecedor");
        echo json_encode($results);
    });
    $app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
    });
    $app->run();


    /*$app = new \slim\slim();
    $app ->config('debug', true);
    $app ->get('/',function(){
       
    });
    $app ->run();*/





    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /* use Rain\Tpl;
    $config = Array(
        "tpl_dir"   =>"Tpl/",
        "cache_dir" =>"cache/"
    );
    Tpl::configure($config);
    //Cirar o Objeto TPL
    $tpl = new Tpl;
    // variavél assing
    $tpl ->assign("Texto1", "Nós do Mercado & estatísticas, oferecemos a você consumidor comum uma contribuição para cadastrar suas compras diárias, depois de criar e alimentar seu banco de dados, você poderá extrair informações tais como: qual o produdo que foi mais consumido em um período de tempo, em quais mercados você frequentou, a variação de preços que os produtos sofreram por local de compra");
    $tpl ->assign("Texto2","O Objetivo deste alplicativo é Oferecer uma ferramenta que lhe permita comparar os preços dos intens mais essenciais para o seu dia a dia ou para os seus momentos de trabalho, lazer, diversão, produtividade e muito mais.");
   //desenha o template
    $tpl ->draw("index"); */

?>