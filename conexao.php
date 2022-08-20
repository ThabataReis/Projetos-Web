<?php

$servidor = "localhost";
$usuario ="root";
$senha = "";
$dbname ="bibliotecatr";

//CRIANDO VARIAVEL DE CONEXAO

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

/*
if($conn){
    echo 'conexao';
}else{
    echo 'erro';
}
*/

?>