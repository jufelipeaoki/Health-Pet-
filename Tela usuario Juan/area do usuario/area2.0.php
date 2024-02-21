<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../Logon.old/login2.0.php");
    exit();
}

// Verifica se o CPF está definido na sessão e atribui-o a uma variável local

require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area 2.0</title>
    <link rel="stylesheet" href="../css/area2.0.css">
    <script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>

</head>
<body>
    <header class="header">
       <img src="../img/MicrosoftTeams-image (3).png" alt="" width="200px" height="200px" style="color: white;"></a>
        <nav class="navbar">       
         <a href="logout.php"><span class="home">|Sair</span></a>   
         </nav>
    </header>

    <section class="Sessao_com_img">
        <div class="titulo">
            <h1>#Health-Pet</h1>
            <p>Respeitar os animais é uma obrigação, amá-los é um privilégio.   </p>
        </div>
     </section>
     
     <div class="text">
        <h1>O que você precisa?</h1>
     </div>

     
     <div class="row">
        <div class="card green">
          <h2>Hora de Cuidar</h2>
          <p>De quem sempre cuida de você!</p>
          <a href="../../Cliente Web/agendar.php"> <button type="submit" name="agendar " value="agendar-agora" >Agendar Aqui!</button></a>  
        </div>
  
        <div class="card blue">
          <h2>Resultados</h2>
          <p>Acompanhe seus Resultados!</p>
          <a href="../../Tela usuario Juan/area do usuario/Resultados.php"> <button type="submit" name="agendar " value="agendar-agora" >Configurar Agora!</button></a>
        </div>
        
        <div class="card blue">
          <h2>Meus Agendamentos!</h2>  
          <p>Verifique seus Agendamentos!</p>
          <a href="calendario.php"> <button type="submit" name="agendar " value="agendar-agora" >Conferir!</button></a>
         </div>
  
        <div class="card red" >
          <h2>Meus pets</h2>
          <p>Informações sobre seu Pet!</p>
          <a href="../../Cliente Web/telaPet.php"> <button type="submit" name="agendar-pet " value="agendar-agora" action="" >Editar!</button></a>
        </div>
      </div>

        <!--Footer-->
<footer >
    <div class="col-1">
    <a href="editUser.php?cpf=<?php echo $_SESSION['usuario'] ?>">Editar Perfil</a>
    </div>
    <div class="col-2">
     <h3>Duvidas</h3>
     <button class="btnfinal"><a href="../area do usuario/solicitacao.php">Fale conosco</a></button>
    </div>
    <div class="col-3">
     <h3>Nossos Contatos</h3>
     <p> Itaquera</p>
    </div>
   </footer>
   <div class="fim">
     <p>&copy; 2023 Todos os direitos Reservados!</p>
    </div>
</body>
</html>
