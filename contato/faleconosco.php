<?php
$dsn = 'mysql:host=localhost;dbname=vet';
$usuario = 'root';
$senha = '';
try {
    $conn = new PDO($dsn, $usuario, $senha);
} catch (PDOException $e) {
    echo $e;
}
$redirect = false; 
if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $msg = $_POST['messagem'];
    $email = $_POST['email'];
    $sql = $conn->prepare('INSERT INTO contato(cli_nome,cli_mensagem, cli_email, data) VALUES (:n, :m, :e, NOW())');
    $sql->execute([":n" => $nome, ":m" => $msg, ":e" => $email]);
    if ($sql) {
        $redirect = true;
    }
}

if ($redirect) {
    header("Location: obrigado.php");
    exit; 
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco</title>
    <link rel="stylesheet" href="../contato/style.css">
</head>

<body>

    <section>

        <form method="POST">
            <center>
                <a href="../Perse-Home/home.html"><h2>Contato</h2></a>
            </center>
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome" autocomplete="on" required>
            <label>E-mail:</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" autocomplete="on" required>
            <label>Mensagem:</label>
            <textarea name="messagem" cols="30" rows="10" placeholder="Digite sua mensagem" required></textarea>

            <button type="submit" name="enviar">Enviar</button>
        

            </fieldset>
        </form>
        <a href="../Perse-Home/home.html"><button id="btn" type="submit" name="home">Home</button></a>
    
    </section>

  
</body>

</html>