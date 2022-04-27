<?php

require 'config.php';


$cpf = filter_input(INPUT_POST, 'cpf');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$endereco = filter_input(INPUT_POST, 'endereco');
$produto = filter_input(INPUT_POST, 'produto');
$telefone = filter_input(INPUT_POST, 'telefone');


if ( $cpf && $nome && $email && $telefone && $senha && $endereco && $produto)  {
     $sql = $pdo->prepare("SELECT * FROM usuario WHERE cpf = :cpf");
     $sql->bindValue(':cpf', $cpf);
     $sql->execute();

     if($sql->rowCount() === 0) {

         $sql = $pdo->prepare
         ("INSERT INTO usuario (cpf,nome,email,telefone,senha,endereco,produto) VALUES (:cpf, :nome, :email, :telefone, :senha, :endereco, :produto)");
         
         $sql->bindValue(':cpf', $cpf);
         $sql->bindValue(':nome', $nome);
         $sql->bindValue(':email', $email);
         $sql->bindValue(':senha', $senha);
         $sql->bindValue(':endereco', $endereco);
         $sql->bindValue(':produto', $produto);
         $sql->bindValue(':telefone', $telefone);
                        $sql->execute();
     
     
          header ("Location: index.php");
         exit;

     } else {
         header("Location: cadastrar.php");
     }

} else {
    header("Location: cadastrar.php");
    exit;
}



?>