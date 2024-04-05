<?php

function conectaBanco($servidor, $usuario, $senha) {
    $bancoDeDados = 'barbearia';
    $conexao = new mysqli($servidor, $usuario, $senha, $bancoDeDados);
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados $conexao->connect_error");
    }
    return $conexao;
}


$nome = $_POST['nome'];
$contato = $_POST['contato'];
$dia_semana = $_POST['dia_semana'];
$pagamento = $_POST['pagamento'];
$horario = $_POST['horario'];



$sql = "INSERT INTO agendamento2 (nome, contato, dia, horario, pagamento) VALUES ('$nome', '$contato', '$dia_semana', '$horario', '$pagamento');";

$conectaBanco = conectaBanco('localhost', 'root', 'root');

$conectaBanco->query($sql);

$conectaBanco->close();

header("Location: ./finalizar.html");

exit;