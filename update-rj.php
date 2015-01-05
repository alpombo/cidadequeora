<?php include_once("restrict_no.php");?>

<?php
ini_set('display_errors', '1');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php
        include_once("Connections/config.php");
        $conexao = mysqli_connect("$hostname_config", "$username_config", "$password_config")
                or die(mysql_error());
        $db = mysql_select_db("$database_config")
                or die(mysql_error());
        ?>

        <title>Cidade que Ora</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/utils.js"></script>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div class="block_header">
                    <div class="logo"><a href="index.html"><img src="images/logo.gif" width="222" height="99" border="0" alt="logo" /></a></div>
                    <div class="header_click">
                        Entre em contato atrav&eacute;s
                        <br />
                        do nosso telefone <a href="#">24.2237-2525 </a></div>
                    <div class="menu">
                        <ul>
                            <li><a href="index.php"><span>Home</span></a></li>
                            <li><a href="#"><span> Minha Conta</span></a></li>
                            <li><a href="#"><span> Contato </span></a></li>
                            <li><a href="logof.php"><span> Sair </span></a></li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="slider_top2">
                <div class="header_text"> 
                    <h2>Painel de Controle</h2>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <div class="body">
            <div class="body_resize">
                <div class="left">

                    <?php
					$usuario = $_SESSION['MM_Username'];			
                    $boas_vindas = mysql_query("SELECT id, nome, email  FROM cadastro WHERE usuario = '$usuario'")
                            or die(mysql_error());
                    if (@mysql_num_rows($boas_vindas) <= '0')
                        echo 'Erro ao selecionar usuário';
                    else {
                        while ($res_boas_vindas = mysql_fetch_array($boas_vindas)) {
                            $id = $res_boas_vindas[0];
							$nome = $res_boas_vindas[1];
                            $email = $res_boas_vindas[2];
							
					?>
                    <?php        
                        }
                    }
                    ?>

                    <h2>Seja bem Vindo <?php echo $nome; ?>, hoje &eacute; dia <?php echo date('d/m/Y'); ?></h2>
                    <p style="font-size:14px;"><strong>Projeto cidade que ora. </strong><br /></p>
                    <p>&nbsp;</p>
                   <?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);  
    include_once ("Connections/config.php");
    $conexao = mysqli_connect("$hostname_config", "$username_config", "$password_config", "$database_config");
    //logando erros
    if(!$conexao){
        print_r(mysqli_error($conexao));
    }
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    //variaveis de post
    $cep = $_POST['cep'];
    $id = $_POST['id'];
    
    for ($index = 0; $index < count($cep); $index++) {
        
        $sql = "INSERT INTO usuario_cep(id_usuario, id_cep) VALUES($id, $cep[$index])";
        $query = mysqli_query($conexao, $sql);
                
    }
    if(!mysqli_errno($conexao)){
        echo '<h1> Cep(s) cadastrado(s) com sucesso! </h1>';
    }else{
        echo '<h1> Problema ao cadastrar o(s) Cep(s)! </h1>';
    }
	?>
    
    <p>Clique<a href="index2.php"> aqui</a> e volte para a área de cadastro.
                </div>
                <div class="right">
                    <h2>Sobre N&oacute;s</h2>
                    <p>O Projeto Cidade que Ora pretende entregar em cada casa de nossa cidade um exemplar do livro &ldquo;Como desenvolver uma vida poderosa de ora&ccedil;&atilde;o&rdquo;.</p>
                    <p>S&atilde;o R$ 3,50 para cada livro (ou R$ 4,00 com o servi&ccedil;o de entrega). Para reservar a sua rua, cep ou condom&iacute;nio &eacute; necess&aacute;rio adiantar R$ 1,00 por livro. O restante ser&aacute; pago uma semana antes do dia da entrega simult&acirc;nea, o que ser&aacute; decidido em assembleia dos &ldquo;adotantes&rdquo;, quando toda a cidade estiver mapeada.</p>
                    <p>A SIB em Petr&oacute;polis doou o correspondente a 1.000 livros para iniciar a Campanha, deixando com a coordena&ccedil;&atilde;o do Projeto a escolha de quais casas receber&atilde;o esses livros.</p>
                    <p><strong>Sobre o livro</strong><br />
                        Este livro do Dr. Gregory Frizzell tem sido um instrumento para revolucionar a vida devocional de milhares de crentes. </p>
                    <img src="images/livro.jpg" alt="picture" width="270" height="404" /></div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
        <div class="footer">
            <div class="footer_resize">
                <p class="leftt">© Copyright Cidade que Ora. Todos os direitos reservados<br />
                    <a href="#">Home</a> | <a href="#">Contato</a></p>
                <p class="rightt">Desenvolvido por <a href="http://www.insidesolucoes.com.br"><strong>Inside Solu&ccedil;&otilde;es Interativas</strong></a></p>
                <div class="clr"></div>
            </div>
        </div>
    </body>
</html>










































