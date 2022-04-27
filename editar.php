<?php

require 'config.php';
  $usuario = [];
  $id = filter_input(INPUT_GET, 'id');

  if($id) {

      $sql = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
      $sql ->bindValue(':id', $id); 
      $sql->execute();

      if ($sql->rowCount() > 0) {
          $usuario = $sql->fetch(PDO::FETCH_ASSOC);
      } else{
    header("Location: index.php");
      }
    
} else{
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="cadastrar.css">
    <title>Edição de Cadastro</title>
  </head>
  <body>
    <main>
      <h1>Editar Fornecedor</h1>

      <div class="alternative">
          <span> DADOS </span>
      </div>

<form method="POST" action="editar_action.php" autocomplete="off">
   <input type="hidden" name="id" value="<?=$usuario['id'];?>">
<label> 
      Cpf: <input type="text" name="cpf" value="<?=$usuario['cpf'];?>">
  </label>
  <label> 
      Nome: <input type="text" name="nome" value="<?=$usuario['nome'];?>">
  </label>
  <label> 
      E-mail: <input type="email" name="email" value="<?=$usuario['email'];?>">
  </label>
  <label> 
      Senha: <input type="text" name="senha" value="<?=$usuario['senha'];?>">
  </label>
  <label>
        Endereço: <input type="text" name="endereco" value="<?=$usuario['endereco'];?>">
    </label>
    <label>
        Produto: <input type="text" name="produto" value="<?=$usuario['produto'];?>">
    </label>
  <label> 
      Telefone: <input type="text" name="telefone" value="<?=$usuario['telefone'];?>">
  </label>
  <input type="submit" value="Atualizar">
</form>
      <div class="return"> 
      <a href="login.html">Clique aqui para voltar ao menu principal</a>
    </div>
  </main>
  <section class="images">
      <div class="circle"></div>
  </section>
</body>
</html>