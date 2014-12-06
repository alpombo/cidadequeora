<?php
    include_once ("Connections/config.php");
    $conexao = mysqli_connect("$hostname_config", "$username_config", "$password_config")
                or die(mysql_error());
    $db = mysql_select_db("$database_config")
                or die(mysql_error());
    $bairro = $_POST['tipo'];
    $sql = "SELECT id, cep, tp_logradouro, logradouro FROM rj WHERE bairro='$bairro'";
    $query = mysql_query($sql);

    while ($cep = mysql_fetch_array($query)) {

        echo '<input type="checkbox" name="cep" value="'.$cep['id'].'" />'.$cep['cep'].' - '.$cep['tp_logradouro']. ' - '.$cep['logradouro']. '<br/>';
    } 


