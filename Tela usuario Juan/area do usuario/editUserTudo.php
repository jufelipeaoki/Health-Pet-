
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Cliente web/tl-pet.css">
    <title>Edit user</title>
</head>

<body>
<header class="header">
  <a href="../area do usuario/area2.0.php"> <img src="../img/MicrosoftTeams-image (3).png" alt="" width="200px" height="200px" style="color: white;"></a>
    <nav class="navbar">
  <!--  <a href="../Tela usuario Juan/area do usuario/area2.0.php"><span>Voltar |</span></a>-->
       
        <a href="logout.php"><span class="home">|Sair</span></a>

    </nav>

</header>
    <br><br>

    <div class="div1">
        <a href="../area do usuario/area2.0.php"> <span id="inicio"> Início </span></a> <span id="continuacao"> </span><br><br>
        <h2>Editar Informações</h2><br>
        <p>Marque consultas e vacinas para o seu melhor amigo.</p>
    </div>

    <h1 id="h1">Editar informações:</h1>
    <main class=>
        <div class="pet1">
            <form method="POST">
            <span class="one">Digite seu CPF para Atualizar:</span>
                 <input type="text" name="cpf"  pattern="\d{11}" maxlength="11" title="Digite exatamente 11 números" required><br><br>
                <ul>
                 <span class="one">Nome:</span>
                 <input type="text" name="nome" required><br><br>
                 <span class="one">RG:</span>
                 <input type="text" name="rg" pattern="\d{1,9}" maxlength="9" title="Digite até 9 números" required><br><br>
                 <span class="one">E-mail:</span>
                 <input type="text" name="email" required ><br><br>
                 <span class="one"> Telefone:</span>
                 <input type="number" name="tel" required><br><br>
                 <span class="one">Rua:</span>
                 <input type="text" name="rua" required><br><br>
                 <span class="one">Bairro:</span>
                 <input type="text" name="bairro" required><br><br>
                 <span class="one">Data de nascimento:</span>
                 <input type="date" name="data" required>
                </ul>
                <button type="submit" class="consulte">Editar </button>
            </form>
        </div>
    
        <button> <a href="../../Cadastro/antigo/novopet.php" class="final_btn">  Novo Pet</a></button>   



</body>

</html>
<?php
session_start(); // Inicializa a sessão

function editarUsuario($nome, $cpf, $rg, $email, $tel, $rua, $datanasc,$bairro) {
    try {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=vet", "root", "");

        // Prepara a consulta SQL para atualizar os dados do usuário
        $sql = "UPDATE usuarios SET cliente_nome = :nome, cliente_rg = :rg, email = :email, endereco = :rua, telefone = :tel, cliente_datanasc = :datanasc , bairro = :bairro WHERE cliente_cpf = :cpf";

        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':datanasc', $datanasc);
        $stmt->bindParam(':bairro', $bairro);


        // Executa a consulta
        $stmt->execute();

        // Verifica se algum registro foi afetado
        if ($stmt->rowCount() > 0) {
            return true; // Retorna verdadeiro se a atualização for bem-sucedida
        } else {
            return false; // Retorna falso se nenhum registro for afetado (nenhum usuário encontrado com o CPF fornecido)
        }
    } catch (PDOException $e) {
        return false; // Retorna falso se houver algum erro no processo de atualização
    }
}

// Verifica se a solicitação é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $rua = $_POST['rua'];
    $datanasc = $_POST['data'];
    $bairro = $_POST['bairro'];

    // Chama a função editarUsuario() para atualizar os dados no banco de dados
    if (editarUsuario($nome, $cpf, $rg, $email, $tel, $rua, $datanasc,$bairro)) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Falha ao atualizar os dados.";
    }
}
?>




