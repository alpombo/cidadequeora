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
    print_r("Status da conexao:". mysqli_connect_errno());
    //variaveis de post
    $cep = $_POST['cep'];
    $id = $_POST['id'];
    print_r($cep);
    
    for ($index = 0; $index < count($cep); $index++) {
        echo '<br>';
        print_r($cep[$index]);
        echo '<br>';
        
        $sql = "INSERT INTO usuario_cep(id_usuario, id_cep) VALUES($id, $cep[$index])";
        echo '<br>';
        print_r($sql);
        echo '<br>';
        $query = mysqli_query($conexao, $sql);
        print_r(mysqli_errno($conexao));
                
    }
    