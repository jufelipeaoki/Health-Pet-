<?php
class Usuario
{
    private $pdo;

    function conectar($usuario, $senha)
    {
        $host = "localhost";
        $usuario_banco = "root";
        $senha_banco = "";
        $dbname = "vet";

        $this->pdo = new PDO("mysql:host=$host;dbname=" . $dbname, $usuario_banco, $senha_banco);
    }

    function cadastrar($cpf, $nome, $opcao, $unidade, $especial, $data,$sex, $cod, $esp, $raca,$hora)
    {
        $sql = $this->pdo->prepare("SELECT cod_agenda FROM agendamentos_consultas WHERE data_agenda = :d ");
        $sql->bindValue(":d", $data);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo ("Data indisponível");
            return false;
        } else {
            // Verificar se o animal pertence ao dono correto
            $sql = $this->pdo->prepare("SELECT pet_id FROM pet WHERE pet_id = :p AND cliente_pet = :cp");
            $sql->bindValue(":p", $cod);
            $sql->bindValue(":cp", $cpf);
            $sql->execute();
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $id_pet = $resultado['pet_id'];

                // Verificar se já existe um agendamento para a mesma data, CPF e horário
                $sql = $this->pdo->prepare("SELECT * FROM agendamentos_consultas WHERE cpf_cli = :c AND data_agenda = :d ");
                $sql->bindValue(":c", $cpf);
                $sql->bindValue(":d", $data);
                $sql->execute();

                if ($sql->rowCount() > 0) {
                    echo "Já existe um agendamento para essa data, CPF e horário";
                    return false;
                } else {
                    $sql = $this->pdo->prepare("INSERT INTO agendamentos_consultas (tipo, medico, unidade, data_agenda, cpf_cli, nome_pet, sexo, id_pet, especie, raca, horarios )  
                        VALUES (:t, :m, :u, :d, :c, :n, :s, :idp , :es, :ra, :hr)");

                    $sql->bindValue(":t", $opcao);
                    $sql->bindValue(":m", $especial);
                    $sql->bindValue(":u", $unidade);
                    $sql->bindValue(":d", $data);
                    $sql->bindValue(":c", $cpf);
                    $sql->bindValue(":n", $nome);
                    $sql->bindValue(":s", $sex);
                    $sql->bindValue(":idp", $id_pet);
                    $sql->bindValue(":es", $esp);
                    $sql->bindValue(":ra", $raca);
                    $sql->bindValue(":hr", $hora);
                    $sql->execute();

                    return true;  // Agendamento realizado com sucesso
                }
            } else {
                echo "Animal não pertence ao dono correto";
                return false;
            }
        }
    }
}
?>
