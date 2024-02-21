<?php
class usuario {
    private $pdo;

    function conectar($usuario, $senha) {
        global $pdo;

        $host = "localhost";
        $usuario_banco = "root";
        $senha_banco = "";
        $dbname = "vet";

        $pdo = new PDO("mysql:host=$host;dbname=" . $dbname, $usuario_banco, $senha_banco);
    }

    function cadastrar($cpf, $nome, $opcao, $unidade, $especial, $data, $hora) {
        global $pdo;

        $sql = $pdo->prepare("SELECT cod_agenda FROM agendamentos_consultas WHERE cpf_cli = :c AND data_agenda = :d AND horario = :h");
        $sql->bindValue(":c", $cpf);
        $sql->bindValue(":d", $data);
        $sql->bindValue(":h", $hora);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;  // Já existe um agendamento para essa data, CPF e horário
        } else {
            $sql = $pdo->prepare("INSERT INTO agendamentos_consultas (tipo, medico, unidade, data_agenda, horario, cpf_cli, nome_pet)  
            VALUES (:t, :m, :u, :d, :h, :c, :n)");

            $sql->bindValue(":t", $opcao);
            $sql->bindValue(":m", $especial);
            $sql->bindValue(":u", $unidade);
            $sql->bindValue(":d", $data);
            $sql->bindValue(":h", $hora);
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":n", $nome);

            $sql->execute();

            return true;  // Agendamento realizado com sucesso
        }
    }
}

session_start();

include_once "conectar.php";

if (isset($_POST['agenda'])) {
    $usuario = new usuario();

    $cpf = $_POST['cpf'];
    $nome = $_POST['pet'];
    $opcao = $_POST['opcao'];
    $unidade = $_POST['escolha'];
    $especial = $_POST['clinico'];
    $data = $_POST['calendar'];
    $hora = $_POST['horario'];

    $result = $usuario->cadastrar($cpf, $nome, $opcao, $unidade, $especial, $data, $hora);

    if ($result) {
        header("location: ../Tela usuario Juan/area do usuario/area2.0.php");
        exit();
    } else {
        echo "Erro no agendamento.";
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
    <link rel="stylesheet" href="agendar.css">
    <title>Agendar</title>
</head>
<body>
<script>alert("Horário já cadastrado")</script>
<header class="header">
    <a href="../Tela usuario Juan/area do usuario/area2.0.php">
        <img src="../Cliente Web/img/branco.png" alt="" width="200px" height="200px" style="color: white;">
    </a>
    <nav class="navbar">
        <a href="#"><span class="home">|Sair</span></a>
    </nav>
</header>
<br><br>

<div class="div1">
    <a href="../Tela usuario Juan/area do usuario/area2.0.php">
        <span id="inicio"> Início </span>
    </a>
    <span id="continuacao"> > Agendar horário</span><br><br>
    <h2>Agendar Aqui! </h2><br>
    <p>Marque consultas e vacinas para o seu melhor amigo.</p>
</div>

<h1 id="h1">Realize seu agendamento</h1>

<main>

    <form method="POST" action="funcao_agenda.php">

        <fieldset class="field">
            <br><br>
            <span> Digite seu CPF:</span>
            <input type="text" name="cpf"><br><br>

            <span>Digite o nome do Pet:</span>
            <input type="text" name="pet"><br><br>

            <span>Escolha o tipo de consulta:</span>
            <div class="form-check form-check-inline">
                <input type="radio" id="html" name="opcao" value="Vacina" class="radios" required>
                <label for="html">Vacina</label>
                <br>

                <input type="radio" id="html" name="opcao" value="Consulta" class="radios" required>
                <label>Consulta</label>
            </div> <br>

            <span>Escolha uma unidade:</span>
            <div class="form-check form-check-inline">
                <input type="radio" id="html" name="escolha" value="Paulista" class="radios" required>
                <label for="html">Avenida Paulista,5318 - Paulista - São Paulo</label>
                <br>

                <input type="radio" id="html" name="escolha" value="Alphavile" class="radios" required>
                <label>Av. Alphaville, 580 - Alphaville, Barueri - SP</label>
            </div> <br>

            <span>Escolha a especialidade:</span>
            <div class="form-check form-check-inline">
                <input type="radio" id="html" name="clinico" value="clinico" class="radios" required>
                <label for="html">Clínico</label>
            </div>
            <br>

            <span>Selecione uma data:</span><br>
            <input type="date" name="calendar" required> <br><br>

            <span>Selecione um horário:</span><br>
            <input type="time" name="hora" required> <br><br>

            <button name="agenda" type="submit">Agendar</button>

        </fieldset><br>
    </form>
</main>
</body>
</html>
