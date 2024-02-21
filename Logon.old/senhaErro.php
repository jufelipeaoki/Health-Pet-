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
$cpf = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $new_password = $_POST['new_password'];

    $conexao = conectarBanco();

    // Atualizar a senha usando o CPF (cuidado com a injeção de SQL)
    $update_sql = "UPDATE usuarios SET senha = ? WHERE cliente_cpf = ?";

    // Usar prepared statement para evitar injeção de SQL
    $stmt = $conexao->prepare($update_sql);
    $stmt->bind_param("ss", $new_password, $cpf);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Troca de senha bem-sucedida";
        header("Location: login2.0.php");
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        // Exibir mensagem de erro na mesma página
        $mensagemErro = "Erro ao atualizar a senha OU senha igual a cadastrada.";
    }

    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro Senha</title>
    <link rel="stylesheet" href="senhaErro.css"></head>
<body>
    <section>
        <script>alert("Erro ao atualizar a senha OU senha igual a cadastrada")</script>

        <section>

            <div class="login-box">
               <form action="atualizar_senha.php" method="post">
                    <h2>Erro Senha</h2>
            
                    <div class="input-box">
                        <span class="icon"><i class="fa-regular fa-envelope fa-lg"></i></span>
                        <label for="cpf">CPF:</label><br>
                        <input type="text" name="cpf" value="<?php echo $cpf; ?>" required><br>
                        <div class="form-text"></div>
    
                    </div>

                    <div class="input-box">
                        <span class="icon"><i class="fa-regular fa-envelope fa-lg"></i></span>
                        <label for="new_password">Nova Senha:</label><br>
                        <input type="password" name="new_password" required><br>
                        <div class="form-text"></div>
    
                    </div>
           
                    <button type="submit" value="Trocar Senha">Alterar</button>
                    <div class="register-links">
                     
                    </div>
                </form>
            </div>
        </section>
        <script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>
    </body>
</html>