

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="Email&Senha.css">
</head>
<body>
    <section>

        <div class="login-box">
           <form action= "atualizar_senha.php" method="post">

                <h2>Alterar Senha</h2>
                
                <input type="hidden" name="cpf" value="<?php echo $_GET['cpf']; ?>">
                
        
                <div class="input-box">
                    <span class="icon"><i class="fa-regular fa-envelope fa-lg"></i></span>
                    <input type="password" name="new_password"   required>
                    <label for="new_password" class="form-label">Nova Senha:</label>
                    <div class="form-text"></div>

                </div>
       
           
                  <button type="submit" value="login">Alterar</button>
                <div class="register-links">
                 
                </div>
            </form>
        </div>
    </section>
<script src="https://kit.fontawesome.com/5d1f9dd1e5.js" crossorigin="anonymous"></script>
</body>
</html>
