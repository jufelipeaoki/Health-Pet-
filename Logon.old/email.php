<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <link rel="stylesheet" href="Email&Senha.css">
</head>
<body>
    <section>
        <div class="login-box">
           <form action="verificar_login.php" method="POST">
                <h2>Email</h2>
                <div class="input-box">
                    <span class="icon"><i class="fa-regular fa-envelope fa-lg"></i></span>
                    <input type="text" name="email" aria-describedby="emailHelp" required>
                    <input type="hidden" name="cpf" value="<?php echo isset($_GET['cpf']) ? $_GET['cpf'] : ''; ?>">
                    <label for="exampleInputEmail1" class="form-label">Digite seu Email:</label>
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <button type="submit" value="login">Buscar</button>
                <div class="register-links">
                </div>
            </form>
        </div>
    </section>
<script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>
</body>
</html>