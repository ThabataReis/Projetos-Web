<?php

include_once("conexao.php");

$cadastro_clientes = $_POST['cadastro_clientes'];
$livro = $_POST['livro'];
$aluguel = $_POST['aluguel'];
$devolucao = $_POST['devolucao'];
$forma_pagamento = $_POST['forma_pagamento'];




echo $consulta ="INSERT INTO `aluguellivro`(`cadastro_clientes`, `livro`, `aluguel`,`devolucao`,`forma_pagamento`) 
 VALUES ('$cadastro_clientes', '$livro','$aluguel', '$devolucao', '$forma_pagamento')";


$result = mysqli_query($conn, $consulta);


mysqli_close($conn);

header('location: aluguellivro.php');

?>