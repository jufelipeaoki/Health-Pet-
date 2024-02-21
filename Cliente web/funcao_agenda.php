<?php
require_once "agenda_funcional.php";

$u = new Usuario;

if (isset($_POST['cpf'])) {
    $cpf = addslashes($_POST['cpf']);
    $nome = addslashes($_POST['pet']);
    $opcao = addslashes($_POST['opcao']);
    $unidade = addslashes($_POST['unidade']);
    $especial = addslashes($_POST['especialidade']);
    $data = addslashes($_POST['data']);
    $cod = addslashes($_POST['cod_pet']);
    $sex = addslashes($_POST['escolha']);
    $esp = addslashes($_POST['especie']);
    $raca = addslashes($_POST['raca']);
    $hora = addslashes($_POST['hora']);

    if (!empty($cpf) && !empty($nome) && !empty($opcao) && !empty($unidade) && !empty($especial) && !empty($data) && !empty($sex) &&  !empty($cod) && !empty($esp)&& !empty($raca) && !empty($hora)) {
        $u->conectar('root', "");

        if (isset($_POST['agenda'])) {
            if ($u->cadastrar($cpf, $nome, $opcao, $unidade, $especial, $data, $sex, $cod , $esp, $raca, $hora)) {
                echo '<div style="color: green;">Cadastrado com sucesso!</div>';
                header("location: ../Tela usuario Juan/area do usuario/area2.0.php");
                exit;
            } else {
                //header("location: agendarErro.php");
                
                exit;
            }
        }
    } else {
        echo 'Preencha todos os dados';
    }
}
?>
