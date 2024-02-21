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

// Inicializa as variáveis
// ... Seu código existente ...
$raca = $nome = $especie = $data = $sexo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['usuario']; // Certifique-se de que $_SESSION['usuario'] esteja definido

    try {
        $conexao = conectarBanco();  // Use a função conectarBanco

        // Use instrução preparada para evitar injeção de SQL
        $con = $conexao->prepare("SELECT * FROM pet WHERE cliente_pet = ?");
        $con->bind_param("s", $user);
        $con->execute();

        $result = $con->get_result();

        // Verifica se a consulta retornou resultados
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $raca = $row["pet_raca"];
            $nome = $row["pet_nome"];
            $data = $row["data_pet"];
            $sexo = $row["pet_sexo"];
            $especie = $row["especie"];
        } else {
            echo "Nenhum resultado encontrado.";
        }

        $con->close();
        $conexao->close();
    } catch (Exception $e) {
        echo "Erro ao buscar pet: " . $e->getMessage();
    }
}


$raca2 = $nome2 = $especie2 = $data2 = $sexo2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["consulta2"])) {
    try {
        $conexao = conectarBanco();

        $con = $conexao->prepare("SELECT * FROM pet WHERE tipo_pet='2' AND cliente_pet = ?");
        $con->bind_param("s", $user);
        $con->execute();

        $result = $con->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $raca2 = $row["pet_raca"];
            $nome2 = $row["pet_nome"];
            $data2 = $row["data_pet"];
            $sexo2 = $row["pet_sexo"];
            $especie2 = $row["especie"];
        } else {
            echo "Nenhum resultado encontrado para Pet2.";
        }

        $con->close();
        $conexao->close();
    } catch (Exception $e) {
        echo "Erro ao buscar Pet2: " . $e->getMessage();
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
    <link rel="stylesheet" href="tl-pet.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <img src="img/branco.png" alt="" width="200px" height="200px" style="color: white;">
        <nav class="navbar">
            <a href="../../Tela usuario Juan/area do usuario/area2.0.php"><span class="home">Home |</span></a>
            <a href="../../projeto/Quem_somos.php">QuemSomos |</a>
            <a href="../../Petshop/serviços.html">Serviços |</a>
            <a href="../../contato/faleconosco.php">Contato |</a>
            <a href="../../Tela usuario Juan/area do usuario/logout.php"><span class="home">Sair</span></a>

        </nav>


        <form action="pesquisa.php" method="post" class="pesquisa">
            <input type="text" placeholder="Pesquisa...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #fafafa;"></i></button>
        </form>
    </header>
    <br><br>

    <div class="div1">
        <a href="#"> <span id="inicio"> Início </span></a> <span id="continuacao"> ﾠ> Agendar horário</span><br><br>
        <h2>Agendar horário</h2><br>
        <p>Marque consultas e vacinas para o seu melhor amigo.</p>
    </div>

    <h1 id="h1">Seus melhores amigos estão aqui:</h1>
    <main class=>
        <div class="pet1">
            <form method="POST">
                <ul>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>nome: <?php echo ($nome) ?> </span></li><br>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>Raça: <?php echo ($raca) ?></span></li><br>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>especie: <?php echo ($especie) ?></span></li><br>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>data: <?php echo ($data) ?></span></li><br>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>meu pet é..<?php echo ($sexo) ?></span></li> <br>
                    <button name="consulta">Pet 1 </button>

                </ul>
            </form>
        </div>
        <div class="pet2">
            <form method="POST">
                <ul>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>nome: <?php echo ($nome2) ?> </span></li><br>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>Raça: <?php echo ($raca2) ?></span></li><br>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>especie: <?php echo ($especie2) ?></span></li><br>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>data: <?php echo ($data2) ?></span></li><br>
                    <li><span class="icon"><i class="fa-solid fa-dog"></i>meu pet é..<?php echo ($sexo2) ?></span></li> <br>
                </ul>
                <button name="consulta2">Pet 2</button>
            </form>
        </div>
        <a href="../../Cadastro/antigo/novopet.php"> Cadastrar novo pet</a>
    </main>



</body>

</html>