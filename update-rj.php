<?php

//$cep = var_dump($_POST['cep']);
//
//for ($index = 0; $index < count($cep); $index++) {
//    echo $cep;
//}
ob_start();
var_dump($_POST['cep']);
print_r($_POST);
$content = ob_get_contents();
ob_end_clean();

echo $content;
//foreach($_POST['cep'] as $tag){
//    //do stuff...e.g.
//    echo $tag;
//}
