<?php
include('cadastro.php');

if (isset($_POST['nome']) && isset($_POST['dia_semana'])) {
    if (empty($_POST['nome'])) {
        echo "Preencha seu nome";
    } elseif (empty($_POST['contato'])) {
        echo "Preencha corretamente seu contato!";
    } else {
        $nome = $mysqli->real_escape_string($_POST['nome ']);
        $dia_semana = $mysqli->real_escape_string($_POST['dia_semana']);

        $sql_code = "SELECT * FROM agendamento WHERE nome = 'nome' AND dia_semana = '$dia_semana'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit;
        } else {
            echo "Falha ao efetuar o login!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Efetue o login para acessar sua conta:</h1>
    <form action="" method="POST">
        <p>
            <label>Nome</label>
            <input type="text" name="nome">
        </p>
        <p>
            <label>contato</label>
            <input type="contato" name="contato">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>

    <p>
        <h5>Não tem cadastro? <br> <a href="cadastro.php">Cadastrar</a> </h5> 
    </p>
</body>
</html>
