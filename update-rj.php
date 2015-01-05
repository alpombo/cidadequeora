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