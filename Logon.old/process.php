<?php

function realizarLogin($email, $senha) {
    session_start();

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

    if (isset($_SESSION['usuario'])) {
        header("Location: ../Tela usuario Juan/area do usuario/area2.0.php");
        exit();
    }

    $conexao = conectarBanco();

    $email = $conexao->real_escape_string($email);
    $senha = $conexao->real_escape_string($senha);

    $consulta = "SELECT * FROM usuarios WHERE cliente_cpf='$email' AND senha = '$senha'";
    $resultado = $conexao->query($consulta);

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            if ($usuario['senha'] == $senha) {
                $_SESSION['usuario'] = $email;
                header("Location: ../Tela usuario Juan/area do usuario/area2.0.php");
                exit();
            }
             else {
                echo("erro");
            }
        } else {
            header("location: telaErro.php");
        }
    } else {
        echo "Erro na consulta: " . $conexao->error;
    }

    $conexao->close();
}
?>
