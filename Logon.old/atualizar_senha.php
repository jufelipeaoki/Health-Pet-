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

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $new_password = $_POST['new_password'];

    $conexao = conectarBanco();

    // Atualizar a senha usando o CPF (cuidado com a injeção de SQL)
    $update_sql = "UPDATE usuarios SET senha = '$new_password' WHERE cliente_cpf = $cpf";

    // Executar a declaração
    $resultado = $conexao->query($update_sql);

    if ($resultado !== false && $conexao->affected_rows > 0) {
        echo "Troca de senha bem-sucedida";
        header("Location: login2.0.php");
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        // Exibir mensagem de erro na mesma página
        header("Location: senhaErro.php");
    }
    
    $conexao->close();
}
?>


