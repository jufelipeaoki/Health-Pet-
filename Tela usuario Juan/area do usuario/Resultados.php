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

$nome = $data = $especialidade = $medico = $unidade = $hora = $resultado =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $user = $_SESSION['usuario'];
    $pet = $_POST['nome'];
    $data = $_POST['data'];

    try {
        $conexao = conectarBanco();

        $con = $conexao->prepare("SELECT * FROM agendamentos_consultas WHERE cpf_cli = ? AND nome_pet= ? AND data_agenda = ?");
        $con->bind_param("sss", $user, $pet,$data);
        $con->execute();

        $result = $con->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome = $row["nome_pet"];
            $datas = $row["data_agenda"];
            $especialidade = $row["tipo"];
            $medico = $row["medico"];
            $unidade = $row["unidade"];
            $hora = $row["horarios"];
          
            $resultado = $row["resultados"];
        } else {
            echo "Nenhum resultado encontrado.";
        }

        $con->close();
        $conexao->close();
    } catch (Exception $e) {
        echo "Erro ao buscar pet: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="stylesheet" href="../css/resultado.css">
  
</head>
<body>
     <header class="header">
    <a href="area2.0.php"> <img src="../img/MicrosoftTeams-image (3).png" alt="" width="200px" height="200px" style="color: white;"></a>
        <nav class="navbar">
          
            <a href="#"><span class="home">|Sair</span></a>

        </nav>

    </header>

    <!--<section class="corpo">

        <div class="link">
            <h2><a href=""><span class="vermelho">Inicio</span> <span class="seta">>Minha agenda</span> </a></h2>
           </div>
       <div class="titulo">
        <h1>Consultar agenda!</h1> <br>
        <p style="color: brown;">Meus agendamentos.

        </p>
        
         </div>-->
    </section>

    <div class="div1">
    <a href="area2.0.php">  <span id="inicio"> Início </span></a> <span id="continuacao">> Resultados </span><br><br>
        <h2>Resultados</h2><br>
        <p>Veja seus Resultados!</p>
    </div>


    <main style="height:620px;">

    <form method="POST">

<fieldset class="field" style="height:560px;">
    <br><br>
    <div class="reservatorio">
    <span> Digite o seu cpf:</span>
    <input type="text" name="cpf"><br>
    <span> Digite o nome do seu pet:</span>
    <input type="text" name="nome">
    <span> Data do agendamento:</span>
    <input type="data" max="31-12-9999" name="data" required>
    <button name="buscar">Consultar</button>
</div>
    <ul class="lista">
        <li><span class="icon"><i class="fa-solid fa-dog"></i>Nome:
                <br><div class="phpCor">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ><?php echo ($nome) ?>
                </div>
            </span></li><br>
        <!-- <li><span class="icon"><i class="fa-solid fa-dog"></i>Data;
              <br> <div class="phpCor">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ><//?php echo ($datas) ?>
                </div>
            </span></li><br> -->
        <li><span class="icon"><i class="fa-solid fa-dog"></i>Especialidade:
               <br><div class="phpCor">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo ($especialidade) ?>
            </span></li><br>

        <li>
        <li>
            <span class="icon"><i class="fa-solid fa-dog"></i>Horario:
                <br><div class="phpCor">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ><?php echo ($hora) ?>
            </span></li><br> </div>

            <span class="icon"><i class="fa-solid fa-dog"></i>Médico:
                <br><div class="phpCor">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ><?php echo ($medico) ?>
            </span></li></div><br> 

        <li><span class="icon"><i class="fa-solid fa-dog"></i>Unidade:
               <br>      <div class="phpCor">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ><?php echo ($unidade) ?>
            </span></li><br> </div>
            
            
        <li><span class="icon"><i class="fa-solid fa-dog"></i>Resultado:
               <br>      <div class="phpCor">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ><?php echo ($resultado) ?>
            </span></li><br> </div> 


    </ul>
</form>
        </fieldset>


    </main>






    

</body>
</html>