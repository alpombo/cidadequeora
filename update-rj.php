<?php
    ini_set('display_errors', '1');  
    include_once ("Connections/config.php");
//    $conexao = mysqli_connect("$hostname_config", "$username_config", "$password_config")
//                or die(mysql_error());
    $db = mysql_select_db("$database_config")
                or die(mysql_error());
    $cep = $_POST['cep'];
    $id = $_POST['id'];
    for ($index = 0; $index < count($cep); $index++) {
        $sql = "UPDATE usuario_cep SET id_usuario=$id, id_cep=$cep[$index]";
        $query = mysql_query($sql ) or die(mysql_error());
        print_r($query);
                
    }
////    mysql_close($conexao);
//include_once ("Connections/config.php");
//ini_set('display_errors', '1');
//function update_rj($sql){
//        
//        $conexao = mysqli_connect("localhost", "root", "azx", "cidadequeora")
//                or die(mysqli_error($conexao));
////        $db = mysql_select_db("$database_config")
////                or die(mysql_error());
//        
//        $query = $conexao->query($sql ) or die(mysqli_error($conexao));
//        $conexao->close();
//        return $query;
//           
//    }
//    
//    $cep = $_POST['cep'];
//    $id = $_POST['id'];
//    for ($index = 0; $index < count($cep); $index++) {
//        $sql = "UPDATE usuario_cep SET id_usuario=$id, id_cep=$cep[$index]";
//        $result = update_rj($sql);
//                
//        echo $result;
//        echo '\n';
//        echo $id;
//        echo '\n';
//        echo $hostname_config;
//        echo $cep[$index];
//        echo '\n';
//        
//    }