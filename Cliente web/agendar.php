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
  <header class="header">
    <a href="../Tela usuario Juan/area do usuario/area2.0.php"><img src="../Cliente Web/img/branco.png" alt="" width="200px" height="200px" style="color: white;"></a>
    <nav class="navbar">
        <a href="logout.php"><span class="home">|Sair</span></a>
    </nav>
</header>
    <br><br>

    <div class="div1">
        <a href="../Tela usuario Juan/area do usuario/area2.0.php"><span id="inicio"> Início </span></a> <span id="continuacao"> > Agendar horário</span><br><br>
        <h2>Agendar Aqui! </h2><br>
        <p>Marque consultas e vacinas para o seu melhor amigo.</p>
    </div>
    
    <h1 id="h1">Realize seu agendamento</h1>

    <main>
    <form method="POST" action="funcao_agenda.php">
        <fieldset class="field" style="height: 850px;">
            <br><br>
            <span> Digite seu CPF:</span>
            <input type="text" name="cpf"><br><br>

            <span>Digite o nome do Pet:</span>
            <input type="text" name="pet"><br><br>

            <span>Digite o Id/Código do Pet:</span>
            <input type="text" name="cod_pet"><br><br>

            <span>Sexo do seu Pet:</span>
            <div class="form-check form-check-inline">
                <input type="radio" id="macho" name="escolha" value="macho" class="radios" required>
                <label for="macho">Macho</label>
                <br>
                <input type="radio" id="femea" name="escolha" value="femea" class="radios" required>
                <label for="femea">Femea</label>
            </div>
            <br>
            <span>Especie do seu Pet:</span>
            <input type="text" name="especie"><br>
            <br>
            <span>Raça do seu Pet:</span>
            <input type="text" name="raca"><br>
            <br>
            <span>Escolha o tipo de consulta:</span>
            <div class="form-check form-check-inline">
                <input type="radio" id="vacina" name="opcao" value="Vacina" class="radios" required>
                <label for="vacina">Vacina</label>
                <br>
                <input type="radio" id="consulta" name="opcao" value="Consulta" class="radios" required>
                <label for="consulta">Consulta</label>
            </div>
            <br>

            <span>Escolha uma unidade:</span>
            <div class="form-check form-check-inline">
                <input type="radio" id="paulista" name="unidade" value="Paulista" class="radios" required>
                <label for="paulista">Avenida Paulista, 5318 - Paulista - São Paulo</label><br><br>
                <input type="radio" id="alphaville" name="unidade" value="Alphavile" class="radios" required>
                <label for="alphaville">Av. Alphaville, 580 - Alphaville, Barueri - SP</label>
            </div>
            <br><br>
                
            <span>Escolha a especialidade:</span>
            <div class="form-check form-check-inline">
                <input type="radio" id="clinico" name="especialidade" value="Clinico" class="radios" required>
                <label for="clinico">Clínico</label>
            </div> 
            <br>

            <span>Selecione uma data:</span><br>
         <input type="data" max="31-12-9999" name="data" required><br>

         <span>Selecione uma Hora:</span><br>
         <input type="text" name="hora" required><br><br>

           <!-- <span>Selecione um horário:</span><br>
            <input type="time" name="hora"> <br><br>
            -->
            <button name="agenda" type="submit">Agendar</button>
        </fieldset><br>
    </form>
    </main>
</body>
</html>
