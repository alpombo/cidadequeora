<?php
    ini_set('display_errors', '1');
?>

<?php require_once('Connections/config.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['senha'];
  $MM_redirectLoginSuccess = "index2.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_config, $config);
  	
  $LoginRS__query=sprintf("SELECT login, senha FROM cadastro WHERE login=%s AND senha=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0);
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
 error_reporting(0)?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include_once("Connections/config.php");
$conexao = mysql_connect("$hostname_config", "$username_config", "$password_config")
		   or die (mysql_error());
$db = mysql_select_db("$database_config")
	  or die(mysql_error());		   
?>

<title>Cidade que Ora</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/easySlider1.5.js"></script>
<script type="text/javascript" charset="utf-8">
// <![CDATA[
$(document).ready(function(){	
	$("#slider").easySlider({
		controlsBefore:	'<p id="controls">',
		controlsAfter:	'</p>',
		auto: true, 
		continuous: true
	});	
});
// ]]>
</script>
<style type="text/css">
.gallery { width:850px; height:315px; margin:0 auto; padding:0; }
#slider { margin:0; padding:0; list-style:none; }
#slider ul,
#slider li { margin:0; padding:0; list-style:none; }
/* 
    define width and height of list item (slide)
    entire slider area will adjust according to the parameters provided here
*/
#slider li { width:850px; height:315px; overflow:hidden; }
p#controls { margin:0; padding:0; position:relative; }
#prevBtn { display:block; margin:0; overflow:hidden; width:34px; height:34px; position:absolute; left:-50px; top:-170px; }
#nextBtn { display:block; margin:0; overflow:hidden; width:34px; height:34px; position:absolute; left: 870px; top:-170px; }
#prevBtn a { display:block; width:34px; height:34px; background:url(images/l_arrow.gif) no-repeat 0 0; }
#nextBtn a { display:block; width:34px; height:34px; background:url(images/r_arrow.gif) no-repeat 0 0; }
</style>
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
          <li><a href="index.php" class="active"><span>Home</span></a></li>
          <li><a href="#"><span> O Livro</span></a></li>
          <li><a href="cadastro.php"><span>Cadastre-se</span></a></li>
          <li><a href="#"><span> Contato </span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="slider_top">
    <div class="header_text">
      <div class="gallery">
        <div id="slider">
          <ul>
            <li>
              <div class="div">
                <div class="left1">
                  <h2>Você conhece o livro<br />
                  acesse o link abaixo!</h2>
                 <p><a href="#"><img src="images/more_info.gif" alt="picture" width="119" height="41" border="0" /></a></p>
                </div>
                <img src="images/slide1.jpg" alt="screen 1" width="410" height="265" border="0" class="screen"  />
                <div class="clr"></div> 
                </div>
            </li>
            <li>
              <div class="div">
                <div class="left1">
                  <h2>Já orou por sua <br />
                    cidade hoje? <br />
                    Aproveite e faça agora!</h2>
                
                </div>
                <img src="images/slide2.jpg" alt="screen 1" width="410" height="265" border="0" class="screen"  />
                <div class="clr"></div> 
              </div>
            </li>
            <li>
              <div class="div">
                <div class="left1">
                  <h2>E, tudo o que pedirdes em oração,<br />
                    crendo, o recebereis. <br />
                  Mateus 21:22</h2>
                 </div>
                <img src="images/slide3.jpg" alt="screen 1" width="410" height="265" border="0" class="screen"  />
                <div class="clr"></div> 
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
    <div class="FBG">
    
   
  <div class="clr"></div>
</div>
      <div class="left">
        <h2>Bem vindo ao nosso site</h2>
        <img src="images/img1.jpg" alt="picture" width="162" height="162" />
        <p>O Projeto Cidade que Ora pretende entregar em cada casa de nossa cidade um exemplar do livro “Como desenvolver uma vida poderosa de oração”.</p>
        <p>São R$ 3,50 para cada livro (ou R$ 4,00 com o serviço de entrega). Para reservar a sua rua, cep ou condomínio é necessário adiantar R$ 1,00 por livro. O restante será pago uma semana antes do dia da entrega simultânea, o que será decidido em assembleia dos “adotantes”, quando toda a cidade estiver mapeada.</p>
        <p>A SIB em Petrópolis doou o correspondente a 1.000 livros para iniciar a Campanha, deixando com a coordenação do Projeto a escolha de quais casas receberão esses livros.</p>
        <div class="bg"></div>
        
      </div>
      <div class="right">
        <h2>Área do Colaborador</h2>
        <div class="login">
      <form method="post" action="<?php echo $loginFormAction; ?>">
        <p><input type="text" name="usuario" value="" placeholder="Login"></p>
        <p><input type="password" name="senha" value="" placeholder="Senha"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>
        <div class="bg"></div>
        
        <h2>Notícias</h2>
        <p class="data">10 |  Dezembro | 2014</p>
        <p>Integer mauris. Cras iaculis viverra dolorqw. Nulla suscipit. Proin eu sapien ac sem fermentum sollicitudin.</p>
        <div class="bg"></div>
        </div>
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
  <div class="clr"></div>
</div>
</div>
</div>


</body>
</html>