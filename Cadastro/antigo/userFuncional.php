<?php
class usuario{

  private $pdo;

  function conectar($user, $pass){

      global $pdo;

      $host= "localhost";

      $user = "root";

      $pass ="";

      $dbname = "vet";

      $pdo = new PDO("mysql:host=$host;dbname=".$dbname,$user,$pass);

  }
  function cadastrar($nome,$email,$rg,$cpf,$tel,$rua,$datanasc,$senha,$bairro){

    global $pdo;

        $sql = $pdo ->prepare ("select cliente_cpf from usuarios where email = :e") ;

        $sql ->bindValue(":e", $email);

        $sql -> execute();

   

        if($sql ->rowCount()>0)

        {

            return false;

           

        }
    else

    {

        $sql=$pdo->prepare("insert into usuarios(cliente_nome,email, cliente_cpf, cliente_rg , telefone ,endereco , cliente_datanasc,senha,bairro)  values(:n,:e,:c,:r,:tel,:end,:d,:s,:b)");

        $sql->bindValue(":n",$nome);

        $sql->bindValue(":e",$email);

    
        $sql->bindValue(":r",$rg);
           
        
        $sql->bindValue(":c",$cpf);


        $sql->bindValue(":tel",$tel);

        $sql->bindValue(":end",$rua);

        $sql->bindValue(":b",$bairro);

        $sql->bindValue(":d",$datanasc);


       

        $sql->bindValue(":s",$senha);
        
       
        $sql->execute();

        return true;

       

    }
    

}

function cadastrarPet($pNome, $pSexo, $raca, $dtpet, $esp,$cli,$num)
{
    global $pdo;

    $sql = $pdo->prepare("SELECT pet_id FROM pet WHERE pet_nome = :n");
    $sql->bindValue(":n", $pNome);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        return false;
    } else {
        $sql = $pdo->prepare("INSERT INTO pet(pet_nome, pet_sexo, pet_raca, data_pet, especie,cliente_pet, numero_pet) VALUES(:n, :s, :r, :d, :e,:c,:nu)");
        $sql->bindValue(":n", $pNome);
        $sql->bindValue(":s", $pSexo);
        $sql->bindValue(":r", $raca);
        $sql->bindValue(":d", $dtpet);
        $sql->bindValue(":e", $esp);
        $sql->bindValue(":c", $cli);
        $sql->bindValue(":nu", $num);
        $sql->execute();

        return true;
    }
}
}
?>