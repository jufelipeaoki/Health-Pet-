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

$nome3 = $raca3 = $sexo3 = $data3 = $especie3  = $id3 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_SESSION['usuario'])) {
    $user = $_SESSION['usuario']; // Certifique-se de que $_SESSION['usuario'] esteja definido

    try {
        $conexao = conectarBanco();  // Use a função conectarBanco

        // Use instrução preparada para evitar injeção de SQL
        $con = $conexao->prepare("SELECT * FROM pet WHERE cliente_pet = ? AND numero_pet=3");
        $con->bind_param("s", $user);
        $con->execute();

        $result = $con->get_result();

        // Verifica se a consulta retornou resultados
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome3 = $row["pet_nome"];
            $raca3 = $row["pet_raca"];
            $data3 = $row["data_pet"];
            $sexo3 = $row["pet_sexo"];
            $especie3 = $row["especie"];
            $id3 = $row["pet_id"];
            


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
        $sql = "UPDATE pet SET $campo = :valor WHERE cliente_pet = $_SESSION[usuario] AND numero_pet=3";

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
        $nome3 = $_POST['nome'];
        if (editarUsuario('pet_nome', $nome3)) {
            echo "Nome atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar o nome.";
        }
    } elseif(isset($_POST['edit_raca'])) {
        $raca3 = $_POST['raca'];
        if (editarUsuario('pet_raca', $raca3)) {
            echo "Raça atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar a raça.";
        }
    } elseif(isset($_POST['edit_sexo'])) {
        $sexo3 = $_POST['sexo'];
        if (editarUsuario('pet_sexo', $sexo3)) {
            echo "Sexo atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar o sexo.";
        }
    } elseif(isset($_POST['edit_especie'])) {
        $especie3 = $_POST['especie'];
        if (editarUsuario('especie', $especie3)) {
            echo "Espécie atualizado com sucesso.";
        } else {
            echo "Falha ao atualizar a espécie.";
        }
    } 
    elseif(isset($_POST['edit_data'])) {
        $data3 = $_POST['data'];
        if (editarUsuario('data_pet', $data3)) {
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
    <link rel="stylesheet" href="../Cliente web/tl-pet.css">
    <title>Gerenciamento Pet</title>
</head>

<body>
<header class="header">
  <a href="../Tela usuario Juan/area do usuario/area2.0.php"> <img src="../Cliente Web/img/branco.png" alt="" width="200px" height="200px" style="color: white;"></a>
    <nav class="navbar">
  <!--  <a href="../Tela usuario Juan/area do usuario/area2.0.php"><span>Voltar |</span></a>-->
       
  <a href="logout.php"><span class="home">|Sair</span></a>


    </nav>

</header>
    <br><br>

    <div class="div1">
        <a href="../Tela usuario Juan/area do usuario/area2.0.php"> <span id="inicio"> Início </span></a> <span id="continuacao">> Pets</span><br><br>
        <h2>Gerenciar Dados do seu Pet</h2><br>
        <p>Veja seus pets cadastrados! </p>
    </div>

    <h1 id="h1">Seus melhores amigos estão aqui!</h1>
    <main class=>
    <div class="pet1">
        <form method="POST">
       <button class="consulte" style="height:50px; width:70px" name="consulte"><?php echo($nome3) ?></button>
        <ul>
                <span class="one">ID/Código do Pet: </span>
                <input type="text" name="id" placeholder="<?php echo($id3);  ?>"> <span>Essa informação será utilizada para realizar agendamentos para seu Pet</span><br><br>
                <span class="one">Nome do Pet: </span>
                <input type="text" name="nome" placeholder="<?php echo($nome3);  ?> "> <button type="submit" name="edit_nome" class="consulte"> <i class="fa-solid fa-pencil"></i> </button><br><br>
                <span class="one">Raça:</span>
                <input type="text" name="raca" placeholder=" <?php echo($raca3);  ?>"> <button type="submit" name="edit_raca" class="consulte"><i class="fa-solid fa-pencil"></i></button><br><br>
                <span class="one"> Meu pet é...</span>
                <input type="text" name="sexo" placeholder=" <?php echo($sexo3);  ?>"> <button type="submit" name="edit_sexo" class="consulte"><i class="fa-solid fa-pencil"></i> </button><br><br>
                <span class="one">Data de Nascimento:</span>
                <input type="text" name="data" placeholder="<?php echo($data3);  ?>" > <button type="submit" name="edit_data" class="consulte"><i class="fa-solid fa-pencil"></i> </button><br><br>
                <span class="one">Espécie: </span>
                <input type="data" name="especie" placeholder="<?php echo($especie3);?>">
                <button type="submit" name="edit_especie" class="consulte"><i class="fa-solid fa-pencil"></i> </button><br>
               <button class="consulte" style="color:White"><a style="color:white;" href="telaPet.php"> voltar</a></button>
            </ul>
        </form>
    </div>
    <button> <a href="../Cadastro/antigo/novopet.php" class="final_btn"> Novo Pet</a></button>   
    </main>



</body>

</html>