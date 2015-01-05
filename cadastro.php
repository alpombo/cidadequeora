<?php
    ini_set('display_errors', '1');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include_once("Connections/config.php");
$conexao = @mysql_connect("$hostname_config", "$username_config", "$password_config")
		   or die (mysql_error());
$db = mysql_select_db("$database_config")
	  or die(mysql_error());		   
?>

<title>Cidade que Ora</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="block_header">
      <div class="logo"><a href="index.html"><img src="images/logo.gif" width="222" height="99" border="0" alt="logo" /></a></div>
      <div class="header_click">
      Entre em contato através
        <br />
      do nosso telefone <a href="#">24.2237-2525 </a></div>
      <div class="menu">
        <ul>
          <li><a href="index.php"><span>Home</span></a></li>
          <li><a href="#"><span> O Livro</span></a></li>
          <li><a href="cadastro.php" class="active"><span>Cadastre-se</span></a></li>
          <li><a href="#"><span> Contato </span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="slider_top2">
    <div class="header_text"> <a href="#"><img src="images/sing_in.gif" alt="picture" width="119" height="42" border="0" /></a>
      <h2>Cadastre-se</h2>
    </div>
  </div>
</div>
<div class="clr"></div>
<div class="body">
  <div class="body_resize">
    <div class="left">
      <h2>Faça seu cadastro</h2>
      <p><strong>Projeto cidade que ora. </strong><br />
        Realize seu cadastro e acesse nosso painel, nelo você tera acesso a reserva do seu cep, valor de livros e encomendas. </p>
      <p>&nbsp;</p>
     
<?php

if(isset($_POST['cadastro']) && $_POST['cadastro'] == 'ok') {
	
	$nome 			= strip_tags(trim($_POST['nome']));
	$email 			= strip_tags(trim($_POST['email']));
	$endereco 		= strip_tags(trim($_POST['endereco']));
	$numero 			= strip_tags(trim($_POST['numero']));
	$complemento 	= strip_tags(trim($_POST['complemento']));
	$bairro 			= strip_tags(trim($_POST['bairro']));
	$cidade 			= strip_tags(trim($_POST['cidade']));
	$estado 			= strip_tags(trim($_POST['estado']));
	$documento 		= strip_tags(trim($_POST['documento']));
	$igreja 			= strip_tags(trim($_POST['igreja']));
	$login 			= strip_tags(trim($_POST['login']));
	$senha 			= strip_tags(trim($_POST['senha']));
	
	$verificar_usuario = mysql_query("SELECT email FROM cadastro WHERE email = '$email'")
	or die(mysql_error());
	if(@mysql_num_rows($verificar_usuario) >= '1'){
		echo "Cadastro não pode ser realizado, pois, o e-mail já se encontra em nossos sistemas";
	}else {
		$cadastra_usuario = mysql_query("INSERT INTO cadastro (nome, email, endereco, numero, complemento, bairro, cidade, estado, documento, igreja, usuario, senha) VALUES('$nome','$email','$endereco','$numero','$complemento','$bairro','$cidade', '$estado','$documento','$igreja','$login','$senha')") or die(mysql_error());
		if($cadastra_usuario >= '1') {
			echo "Usuário cadastrado com sucesso!";
		}else {
			echo "Erro ao cadastrar usuário";
		}
	}
}
?>       
      
      <form name="cadastro" action="" method="post" enctype="multipart/form-data" id="contactform">
        <ol>
          <li>
            <label for="name">Nome <span>*</span></label>
            <input type="text" id="name" name="nome" class="text" />
          </li>
           <li>
            <label for="name">E-mail <span>*</span></label>
            <input type="text" id="name" name="email" class="text" />
          </li>
          <li>
            <label for="email">Endereço <span class="red">*</span></label>
            <input type="text" id="email" name="endereco" class="text" />
          </li>
          <li>
            <label for="company">Número <span class="red">*</span></label>
            <input type="text" id="company" name="numero" class="text" />
          </li>
          <li>
            <label for="subject">Complemento</label>
            <input type="text" id="subject" name="complemento" class="text" />
          </li>
          <li>
            <label for="name">Bairro <span>*</span></label>
            <input type="text" id="name" name="bairro" class="text" />
          </li>
          <li>
            <label for="email">Cidade <span class="red">*</span></label>
            <input type="text" id="email" name="cidade" class="text" />
          </li>
          <li>
            <label for="company">Estado <span class="red">*</span></label>
            <input type="text" id="company" name="estado" class="text" />
          </li>
          <li>
            <label for="subject">CPF ou CNPJ <span class="red">*</span></label>
            <input type="text" id="subject" name="documento" class="text" />
          </li>
          <li>
            <label for="email">Igreja <span class="red">*</span></label>
            <input type="text" id="email" name="igreja" class="text" />
          </li>
          <li>
            <label for="company">Login <span class="red">*</span></label>
            <input type="text" id="company" name="login" class="text" />
          </li>
          <li>
            <label for="subject">Senha <span class="red">*</span></label>
            <input type="password" id="subject" name="senha" class="text" />
          </li>
          <li>
            <label for="subject">Repita a Senha <span class="red">*</span></label>
            <input type="password" id="subject" name="senha2" class="text" />
          </li>
          
          <li class="buttons">
          	<input type="hidden" name="cadastro" value="ok" >
            <input type="image" name="imageField" id="imageField" src="images/send.gif" />
          </li>
        </ol>
      </form>
    </div>
    <div class="right">
      <h2>Sobre Nós</h2>
      <p>O Projeto Cidade que Ora pretende entregar em cada casa de nossa cidade um exemplar do livro “Como desenvolver uma vida poderosa de oração”.</p>
        <p>São R$ 3,50 para cada livro (ou R$ 4,00 com o serviço de entrega). Para reservar a sua rua, cep ou condomínio é necessário adiantar R$ 1,00 por livro. O restante será pago uma semana antes do dia da entrega simultânea, o que será decidido em assembleia dos “adotantes”, quando toda a cidade estiver mapeada.</p>
        <p>A SIB em Petrópolis doou o correspondente a 1.000 livros para iniciar a Campanha, deixando com a coordenação do Projeto a escolha de quais casas receberão esses livros.</p>
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
    <p class="rightt">Desenvolvido por <a href="http://www.insidesolucoes.com.br"><strong>Inside Soluções Interativas</strong></a></p>
    <div class="clr"></div>
  </div>
</div>
</body>
</html>