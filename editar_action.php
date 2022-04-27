<?php

require 'config.php';

  $id = filter_input(INPUT_POST, 'id');
  $cpf = filter_input(INPUT_POST, 'cpf');
  $nome = filter_input(INPUT_POST, 'nome');
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $senha = filter_input(INPUT_POST, 'senha');
  $endereco = filter_input(INPUT_POST, 'endereco');
  $produto = filter_input(INPUT_POST, 'produto');
  $telefone = filter_input(INPUT_POST, 'telefone');

  if ($id && $cpf && $nome && $email && $telefone && $senha && $endereco && $produto) {
      $sql = $pdo->prepare
      ("UPDATE usuario SET
       cpf = :cpf, nome = :nome, email = :email, telefone = :telefone, senha = :senha, endereco = :endereco, produto = :produto WHERE id = :id");

      $sql->bindValue(':cpf', $cpf);
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':senha', $senha);
      $sql->bindValue(':endereco', $endereco);
      $sql->bindValue(':produto', $produto);
      $sql->bindValue(':telefone', $telefone);
      $sql->bindValue(':id', $id);
      $sql->execute();

      header("Location: index.php");
      exit;

  } else { 
    //header("Location: index.php");
    //exit;

  }