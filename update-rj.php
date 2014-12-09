<?php
        include_once ("Connections/config.php");
    $conexao = mysqli_connect("$hostname_config", "$username_config", "$password_config")
                or die(mysql_error());
        $db = mysql_select_db("$database_config")
                or die(mysql_error());
    $cep = $_POST['cep'];
    $id = $_POST['id'];
    for ($index = 0; $index < count($cep); $index++) {
        $sql = "UPDATE rj SET id_usuario=$id where cep='$cep[$index]'";
        $query = mysql_query($sql ) or die(mysql_error());
        print_r($query);
                
    }
//    mysql_close($conexao);
//function update_rj($sql){
//        include_once ("Connections/config.php");
//        $conexao = new mysqli_connect("$hostname_config", "$username_config", "$password_config", "$database_config")
//                or die(mysql_error());
//        $db = mysql_select_db("$database_config")
//                or die(mysql_error());
//        
//        $query = $conexao->query($sql ) or die(mysql_error());
//        $conexao->close();
//        return $query;
//           
//    }
//    
//    $cep = $_POST['cep'];
//    $id = $_POST['id'];
//    for ($index = 0; $index < count($cep); $index++) {
//        $sql = "UPDATE rj SET id_usuario=$id WHERE cep='$cep[$index]'";
//        $result = update_rj($sql);
//                
//        echo $result;
//        echo '\n';
//        echo $id;
//        echo '\n';
//        echo $cep[$index];
//        echo '\n';
//        
//    }