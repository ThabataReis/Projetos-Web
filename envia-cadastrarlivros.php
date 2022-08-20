<?php

include_once("conexao.php");

$titulo_livro = $_POST['titulo_livro'];
$autor = $_POST['autor'];
$editora = $_POST['editora'];
$ano_de_lancamento = $_POST['ano_de_lancamento'];
$sinopse = $_POST['sinopse'];
$valor_de_aluguel = $_POST['valor_de_aluguel'];
$quantidade = $_POST['quantidade'];



echo $consulta ="INSERT INTO `cadastrarlivros`(`titulo_livro`, `autor`, `editora`,`ano_de_lancamento`,`sinopse`, `valor_de_aluguel`,`quantidade`) 
 VALUES ('$titulo_livro', '$autor','$editora', '$ano_de_lancamento', '$sinopse', '$valor_de_aluguel', '$quantidade')";


$result = mysqli_query($conn, $consulta);


mysqli_close($conn);

header('location: cadastrarlivros.php');

?>