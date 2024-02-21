<?php
require_once "userFuncional.php";

$u = new usuario;

if (isset($_POST['nome'])) {
    $pnome = addslashes($_POST['nome']);
    $raca = addslashes($_POST['raca']);
    $esp = addslashes($_POST['especie']);
    $dtpet = addslashes($_POST['data']);
    $psexo = addslashes($_POST['escolha']);
    $cli = addslashes($_POST['cpf']);
    $num = addslashes($_POST['numero']);

    if (!empty($pnome) && !empty($dtpet) && !empty($raca) && !empty($psexo) && !empty($esp) && !empty($cli)) {
        $u->conectar('root', "");
        if ($u->cadastrarPet($pnome, $psexo, $raca, $dtpet, $esp,$cli,$num)) {
            
            header("location:novopetErro.php");
        } else {
            echo 'Erro ao cadastrar pet no banco de dados';
        }
    } else {
        echo 'Preencha todos os campos obrigatórios';
    }
}
?>
