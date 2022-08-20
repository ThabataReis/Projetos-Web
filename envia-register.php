<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$dt_nasc = $_POST['dt_nasc'];
$sexo = $_POST['sexo'];
$celular = $_POST['celular'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$repetir_senha = $_POST['repetir_senha'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$palavra_chave = $_POST['palavra_chave'];


$consulta = "INSERT INTO `register`(`nome`, `sobrenome`, `dt_nasc`, `sexo`, `celular`, `cpf`, `email`, `senha`, `repetir_senha`, `cep`, `estado`, `rua`, `numero`, `bairro`, `cidade`, `palavra_chave`) 
VALUES ('$nome','$sobrenome','$dt_nasc ','$sexo','$celular','$cpf','$email','$senha','$repetir_senha','$cep','$estado','$rua','$numero','$bairro','$cidade','$palavra_chave')";

$result = mysqli_query($conn, $consulta);


mysqli_close($conn);

header('location: register.php');

?>