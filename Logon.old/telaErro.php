<script>alert("Erro de login ou senha!");</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try again</title>
    <link rel="stylesheet" href="login2.0.css">
</head>
<body>
    <?php
require_once('process.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["exampleInputPassword1"];
    $depto = $_POST["depto"];

    realizarLogin($email, $senha, $depto);
}
?>
    <section>

        <div class="login-box">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!--<h1>Health-Pet</h1>-->
                <h2>Login</h2>
                <!--  <center> <img src="img/logo-removebg-preview.png" alt="" height="120px" width="120px" style="color: white ;"></center>-->
             
                <div class="input-box">
                    <span class="icon"><i class="fa-regular fa-envelope fa-lg"></i></span>
                    <input type="text" name="email" aria-describedby="emailHelp" required>
                    <label for="exampleInputEmail1" class="form-label">Digite seu CPF:</label>
                    <div id="emailHelp" class="form-text"></div>

                </div>
       
           
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password"  name="exampleInputPassword1" required>
                    <label class="form-label">Senha :</label>
                </div>
                  <br>


                <button type="submit" value="Entrar">Entrar</button>
                <div class="register-links">
                    <p><a href="../Logon.old/email.php">Esqueceu sua senha?</a></p>
                    <p>Não Possui uma conta? <a href="../Cadastro/antigo/user.php">Cadastrar!</a></p>
                </div>
            </form>
        </div>
    </section>
<script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>
</body>
</html>
