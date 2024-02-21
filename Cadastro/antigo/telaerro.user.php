<script>alert("Usuario já cadastrado!");</script>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadastroUser</title>
    <link rel="stylesheet" href="user.css">

</head>

<body>
    <section>

        <div class="login-box">
            <form action="cadastroUser.php" method="POST">
                <a href="../../Perse-Home/home.html">
                    <h1>Health-Pet</h1><br>
                </a>
                <center>
                    <h2 st>Cadastre-se</h2>
                </center>
                <!--  <center> <img src="img/logo-removebg-preview.png" alt="" height="120px" width="120px" style="color: white ;"></center>-->
                <div class="input-box">
                    <span class="icon"><i class="fa-regular fa-user"></i></span>
                    <input type="text" name="nome" required>
                    <label>Nome :</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-regular fa-envelope fa-lg"></i></span>
                    <input type="text" name="email" required>
                    <label for="">Email :</label>

                </div>
                <div class="input-box">

                    <span class="icon"><i class="fa-regular fa-file fa-lg"></i></span>

                    <input type="text" id="rg" name="rg" pattern="\d{1,9}" maxlength="9" title="Digite até 9 números"
                        required>
                    <label for="">RG:</label>
                </div>



                <div class="input-box">
                    <span class="icon"><i class="fa-regular fa-file fa-lg"></i></span>
                    <input type="text" id="cpf" name="cpf" pattern="\d{11}" maxlength="11"
                        title="Digite exatamente 11 números" required>
                    <label for="">CPF :</label>

                </div>

                <div class="input-box">
                    <label for="data"></label>
                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>

                    <input type="date" max="9999-12-31" name="data" required>
                </div>



                <!--<div class="input-box">
                    <span class="icon"><i class="fa-solid fa-phone"></i></span>
                    <input type="tel" name="tel" placeholder="(xx) xxxxx-xxxx" required>
                    <label>Tel:</label>
                </div>-->

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-phone"></i></span>
                    <input type="tel" id="telefone" name="tel" >
                    <label>Telefone:</label>
                </div>
                <script>
                    document.getElementById('telefone').addEventListener('input', function (event) {
                        var telefone = event.target.value.replace(/\D/g, ''); // Remove todos os caracteres que não são dígitos

                        // Verifica se o telefone tem mais de 2 dígitos
                        if (telefone.length > 2) {
                            // Adiciona parênteses após o DDD (2 primeiros dígitos)
                            telefone = '(' + telefone.substring(0, 2) + ')' + telefone.substring(2);
                        }

                        // Verifica se o telefone tem mais de 9 dígitos
                        if (telefone.length > 9) {
                            // Adiciona hífen após os próximos 4 dígitos
                            telefone = telefone.substring(0, 9) + '-' + telefone.substring(9);
                        }

                        // Limita o número de dígitos do telefone a 14
                        telefone = telefone.substring(0, 14);

                        // Atualiza o valor do campo de entrada
                        event.target.value = telefone;
                    });
                </script>
                
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="text" name="rua" required>
                    <label>Rua :</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="text" name="bairro" required>
                    <label>Bairro :</label>
                </div>


                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="senha" required>
                    <label>Senha :</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="confsenha" required>
                    <label>Confirme a senha :</label>
                </div>



                <button type="submit" value="Entrar">Cadastrar!</button><br><br>

                <button type="reset" value="Limpar">Limpar</button>

                <div class="register-links">
                    <p>Já Possui uma conta? <a href="../../Logon.old/login2.0.php">Login!</a></p>
                </div>




            </form>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>
</body>

</html>