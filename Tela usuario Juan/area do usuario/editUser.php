
<?php
session_start(); 

function conectarBanco()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}

$nome = $rg = $data = $email = $telefone = $endereco = $bairro = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['consulte'])) {
    $user = $_SESSION['usuario']; // Certifique-se de que $_SESSION['usuario'] esteja definido

    try {
        $conexao = conectarBanco();  // Use a função conectarBanco

        // Use instrução preparada para evitar injeção de SQL
        $con = $conexao->prepare("SELECT * FROM usuarios WHERE cliente_cpf = ?");
        $con->bind_param("s", $user);
        $con->execute();

        $result = $con->get_result();

        // Verifica se a consulta retornou resultados
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome = $row["cliente_nome"];
            $rg = $row["cliente_rg"];
            $data = $row["cliente_datanasc"];
            $email = $row["email"];
            $telefone = $row["telefone"];
            $endereco = $row["endereco"];
            $bairro = $row["bairro"];


        } else {
            echo "Nenhum resultado encontrado.";
        }

        $con->close();
        $conexao->close();
    } catch (Exception $e) {
        echo "Erro ao buscar pet: " . $e->getMessage();
    }
}
function editarUsuario($campo, $valor) {
    try {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=vet", "root", "");

        // Prepara a consulta SQL para atualizar o campo específico do usuário
        $sql = "UPDATE usuarios SET $campo = :valor WHERE cliente_cpf = $_SESSION[usuario]";

        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':valor', $valor);
        

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
    

    // Chama a função editarUsuario() para atualizar os dados no banco de dados
    if(isset($_POST['edit_nome'])) {
        $nome = $_POST['nome'];
        if (editarUsuario('cliente_nome', $nome)) {
            echo "Nome atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar o nome.";
        }
    } elseif(isset($_POST['edit_rg'])) {
        $rg = $_POST['rg'];
        if (editarUsuario('cliente_rg', $rg)) {
            echo "RG atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar o RG.";
        }
    } elseif(isset($_POST['edit_email'])) {
        $email = $_POST['email'];
        if (editarUsuario('email', $email)) {
            echo "E-mail atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar o e-mail.";
        }
    } elseif(isset($_POST['edit_tel'])) {
        $tel = $_POST['tel'];
        if (editarUsuario('telefone', $tel)) {
            echo "Telefone atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar o telefone.";
        }
    } elseif(isset($_POST['edit_rua'])) {
        $rua = $_POST['rua'];
        if (editarUsuario('endereco', $rua)) {
            echo "Rua atualizada com sucesso.";
        } else {
            echo "Falha ao atualizar a rua.";
        }
    } elseif(isset($_POST['edit_bairro'])) {
        $bairro = $_POST['bairro'];
        if (editarUsuario('bairro', $bairro)) {
            echo "Bairro atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar o bairro.";
        }
    } elseif(isset($_POST['edit_data'])) {
        $datanasc = $_POST['data'];
        if (editarUsuario('cliente_datanasc', $datanasc)) {
            echo "Data de nascimento atualizada com sucesso.";
        } else {
            echo "Falha ao atualizar a data de nascimento.";
        }
    }
}
?>

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
    
</div>

<h1 id="h1">Editar informações:</h1>
<main class=>
    <div class="pet1">
        <form method="POST">
        <button name="consulte">Consulte</button>
        <ul>
                <span class="one">Nome: </span>
                <input type="text" name="nome" placeholder="<?php echo($nome);  ?>"> <button type="submit" name="edit_nome" class="consulte" placeholder=""><i class="fa-solid fa-pencil"></i></button><br><br>
                <span class="one">RG: </span>
                <input type="text" name="rg" pattern="\d{1,9}" maxlength="9" title="Digite até 9 números" placeholder="<?php echo($rg);  ?> "> <button type="submit" name="edit_rg" class="consulte"> <i class="fa-solid fa-pencil"></i> </button><br><br>
                <span class="one">E-mail:</span>
                <input type="text" name="email" placeholder=" <?php echo($email);  ?>"> <button type="submit" name="edit_email" class="consulte"><i class="fa-solid fa-pencil"></i></button><br><br>
                <span class="one"> Telefone:</span>
                <input type="number" name="tel" placeholder=" <?php echo($telefone);  ?>"> <button type="submit" name="edit_tel" class="consulte"><i class="fa-solid fa-pencil"></i> </button><br><br>
                <span class="one">Rua:</span>
                <input type="text" name="rua" placeholder="<?php echo($endereco);  ?>" > <button type="submit" name="edit_rua" class="consulte"><i class="fa-solid fa-pencil"></i> </button><br><br>
                <span class="one">Bairro: </span>
                <input type="text" name="bairro" placeholder="<?php echo($bairro);  ?>" > <button type="submit" name="edit_bairro" class="consulte"><i class="fa-solid fa-pencil"></i> </button><br><br>
                <span class="one">Data de nascimento: </span>
                <input type="data" name="data" placeholder="<?php echo($data);?>">
                <button type="submit" name="edit_data" class="consulte"><i class="fa-solid fa-pencil"></i> </button>
            </ul>
        </form>
    </div>
    <button> <a href="../../Cadastro/antigo/novopet.php" class="final_btn">  Novo Pet</a></button>
   
</body>

</html>

