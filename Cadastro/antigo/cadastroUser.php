<?php
require_once "userFuncional.php";
$u = new usuario;
if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);

    $email = addslashes($_POST['email']);

    $rg = addslashes($_POST['rg']);

    $cpf = addslashes($_POST['cpf']);

    $datanasc = addslashes($_POST['data']);

    $tel = addslashes($_POST['tel']);

    $rua = addslashes($_POST['rua']);


    $senha = addslashes($_POST['senha']);

    $confsenha = addslashes($_POST['confsenha']);

    $bairro = addslashes($_POST['bairro']);



    if (!empty($nome) && !empty($senha) && !empty($email) && !empty($cpf) && !empty($confsenha) && !empty($bairro)){
        $u->conectar('root', "");
        if ($senha == $confsenha) {
            if ($u->cadastrar($nome, $email, $rg, $cpf, $tel, $rua, $datanasc, $senha,$bairro)) {
                echo "Cadastrado com sucesso!";
                header("location: ../../Logon.old/login2.0.php");
                
            } else {
                header("location: telaErro.user.php");
            }
        } 
        else{


            echo 'Senhas não correspondem';
        }
        
    } 
    else {
        echo 'Preencha todos os dados';
    }

}
?>
