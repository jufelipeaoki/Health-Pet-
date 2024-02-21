<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../Logon.old/login2.0.php");
    exit();
}

require_once('conectar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="consultas-vacinas.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <img src="img/branco.png" alt=""width="200px" height="200px" style="color: white;">
        <nav class="navbar">
            <a href="../Perse-Home/index.html"><span class="home">Home |</span></a>
         <a href="../projeto/Quem_somos.html">QuemSomos |</a>
         <a href="../Petshop/serviços.html">Serviços |</a>
         <a href="../contato/faleconosco.php">Contato |</a>
         <a href="funcao.php" method="POST"><span class="home">Sair</span></a>
        
        </nav>
 
 

 
     <form action="" class="pesquisa">
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
    
     
    <div id="center">
    <main>
        <fieldset class="fild">
            <legend style="color: brown; font-weight: bold;" >Serviços</legend>
        <h2 id="h1">Escolha o serviço para </h2>
    <hr class="hr-menor"><br>   

        <form method="post">
            
            

        <div class="form-check form-check-inline">
                    <input type="radio" id="html" name="opc" value="consulta" required>
                    <label for="html">Consultas</label>

                    <input type="radio" id="html" name="opc" value="vacina" required>
                    <label>Vacina</label>
                  </div> 
                  <br>

         <article>
            <a href="agendar.php" class="button" type="submit" value="voltar">Voltar</a>
            <br><br>
            <button class="button" type="submit" value="continuar">Continuar</button> 
                    
        </article>
            <br><br>

            <a id="cadastrar" href="../Cadastro/antigo/cadastroPet.php"> <img height="15px" width="15px" src="img/mais-novo.png" alt=""> Cadastrar novo pet</a>
            </form>
        </fieldset>

            
    </main>
</div>
    
</body>
</html>
<?php

$opcao = filter_input(INPUT_POST, 'opc'); 

if($opcao == 'vacina')
{
    header("location: uniade.php");
    
}
else if($opcao == "consulta")
{
    header("location: clinico.php");
}

?>

