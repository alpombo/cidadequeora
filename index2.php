<?php
    ini_set('display_errors', '1');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include_once("Connections/config.php");
$conexao = mysqli_connect("$hostname_config", "$username_config", "$password_config")
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
          <li><a href="#"><span> Minha Conta</span></a></li>
          <li><a href="#"><span> Contato </span></a></li>
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
	$boas_vindas = mysql_query("SELECT nome, email FROM cadastro")
	or die(mysql_error());
	if(@mysql_num_rows($boas_vindas) <= '0') echo 'Erro ao selecionar usuário'; else {
		while($res_boas_vindas=mysql_fetch_array($boas_vindas)) {
			$nome = $res_boas_vindas[0];
			$email = $res_boas_vindas[1];
?>
<?php
}
}    
 ?>   
      <h2>Seja bem Vindo <?php echo $nome; ?>, hoje é dia <?php echo date('d/m/Y'); ?></h2>
      <p><strong>Projeto cidade que ora. </strong><br />
        Faça a reserva do seu cep abaixo: </p>
      <p>&nbsp;</p>
<?php

$query = mysql_query("SELECT DISTINCT bairro FROM rj");     
?>      
      <form name="produto" method="post" action="">
 <label for="">Selecione o bairro: </label>
 <select>
 <option>Selecione...</option>
 
 <?php while($bairro = mysql_fetch_array($query)) { ?>
 <option value="<?php echo $bairro['id_bairro'] ?>"><?php echo $bairro['bairro'] ?></option>
 <?php } ?>
 
 </select>
=======
$query = mysql_query("SELECT DISTINCT bairro FROM rj");     
?>      
<form name="produto" method="post" action="">
    <label for="">Selecione o bairro: </label>
    <select>
        <option>Selecione...</option>

        <?php while($bairro = mysql_fetch_array($query)) { ?>
            <option value="<?php echo $bairro['bairro'] ?>"><?php echo $bairro['bairro'] ?></option>
        <?php } ?>

     </select>
>>>>>>> origin/master
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