
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/pet.css">
</head>

<body>
    <section>
    <script>alert("Pet Cadastrado com sucesso! Clique em Health Pet para retornar")</script>

        <div class="login-box">
            <form action="cadastroPet.php" method="POST">
              <a href="../../Tela usuario Juan/area do usuario/area2.0.php"> <h1 >Health-Pet</h1></a> <br>
                <h2>Cadastre seu Pet!</h2><br>
                <!--  <center> <img src="img/logo-removebg-preview.png" alt="" height="120px" width="120px" style="color: white ;"></center>-->
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-dog"></i></span>
                    <input type="text" name="nome" required>
                    <label>Nome :</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-dog"></i></span>
                    <input type="text" name="raca" required>
                    <label>Raça :</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-dog"></i></span>
                    <input type="text" name="especie"  required>
                    <label>especie :</label>
                </div>
                

                <div class="input-box">

                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>

                    <input type="date" name="data" required>
                </div>

            

                <div class="escolhas">
                    <input type="radio" id="codificação" name="escolha" value="Macho" required/>
                    <label for="Masculino"> Macho </label>
               
               
                    <input type="radio" id="música" name="escolha" value="Femea" required/>
                    <label for="Feminino"> Fêmea </label>
                </div>

                
                <div class="input-box">
                    <span class="icon"><i class="fa-regular fa-file fa-lg"></i></span>
                    <input type="text" name="cpf" required>
                    <label>Cpf do tutor :</label>

                </div>



                <button type="submit" value="Entrar">Cadastrar!</button>
                
            </form>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>
</body>

</html>