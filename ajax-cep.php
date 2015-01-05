<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Cidade que Ora</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        
</head>

<?php
    include_once ("Connections/config.php");
    $conexao = mysqli_connect("$hostname_config", "$username_config", "$password_config", "$database_config");
    
    $bairro = $_POST['tipo'];
    $sql = "SELECT id, cep, tp_logradouro, logradouro FROM rj WHERE bairro='$bairro'";
    $query = mysqli_query($conexao, $sql);

    while ($cep = mysqli_fetch_array($query)) {
        //filtrando ceps já cadastrados
        $filter_sql = "SELECT id from usuario_cep where id_cep=".$cep['id'].";";
        $filter = mysqli_query($conexao, $filter_sql);
        if($filter->num_rows != 0){
            continue;
        }
        //############################
        echo '<input type="checkbox" name="cep[]" value="'.$cep['id'].'" />'.$cep['cep'].' - '.$cep['tp_logradouro']. ' - '.$cep['logradouro']. '<br/>';
    }


