<?php
session_start(); // Start the session

include('conexao.php'); // Include the database connection

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $mysql->real_escape_string($_POST['nome']);
    $senha = $mysql->real_escape_string($_POST['senha']);

    if (empty($nome)) {
        echo "Preencha seu nome";
    } elseif (empty($senha)) {
        echo "Preencha sua senha";
    } else {
        $sql_code = "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'";
        $sql_query = $mysql->query($sql_code) or die ("Falha na execução do código SQL: " . $mysql->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header('Location: http://127.0.0.1:5500/quiz.html');
            exit();
        } else {
            header("Location: http://localhost:85/QUIZ-PRONTO-main/index.php");
            exit();
        }
    }
}
?>