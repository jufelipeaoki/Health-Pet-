<?php
function conectarBanco() {
    $host = "localhost";
    $usuario = "root";
    $senha = ""; 
    $banco = "vet";

    $conexao = new mysqli($host, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }

    return $conexao;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_digitado = $_POST["email"];

    $conexao = conectarBanco();

    // Consulta para obter o CPF associado ao e-mail
    $consulta = "SELECT cliente_cpf FROM usuarios WHERE email = '$email_digitado'";
    $resultado = $conexao->query($consulta);

    if ($resultado->num_rows > 0) {
        $cpf = $resultado->fetch_assoc()['cliente_cpf'];

        // Redirecionar para a página de troca de senha com o CPF
        header("Location: trocar_senha.php?cpf=$cpf");
        exit();
    } else {
        echo "E-mail não encontrado. Tente novamente.";
    }

    $conexao->close();
}
?>
