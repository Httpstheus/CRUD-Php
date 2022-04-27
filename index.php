<?php
 require 'config.php';

 $lista = [];
 $sql = $pdo->query("SELECT * FROM usuario");

   if ($sql->rowCount() > 0) {
       $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <div class="title">
     
    <h1> Dados de Fornecedores Ativos</h1>
    <h3>Aqui você pode ver as informações relevantes sobre cada fornecedor em uma tabela,<br>
     podendo alterar ou excluir os dados, para cadastrar um novo fornecedor, <br>
    Clique em "Cadastrar usuário"</h3>
    </div>
    
    <div class="exibicao">
 <table border="1">
        <tr>
            <th>ID</th>
            <th>CPF</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Senha</th>
            <th>Endereço</th>
            <th>Produto</th>
            <th>Telefone</th>
            <th>Alteração</th>
            <th>Exclusão</th>
        </tr>
        <?php foreach ($lista as $usuario): ?>
            <tr>
                  <td>  <?=$usuario['id'];?>  </td>
                  <td>  <?=$usuario['cpf'];?>  </td>
                  <td>  <?=$usuario['nome'];?>  </td>
                  <td>  <?=$usuario['email'];?>  </td>
                  <td>  <?=$usuario['senha'];?>  </td>
                  <td>  <?=$usuario['endereco'];?>  </td>
                  <td>  <?=$usuario['produto'];?>  </td>
                  <td>  <?=$usuario['telefone'];?>  </td>
    
                  <td> <a href="editar.php?id=<?=$usuario['id'];?>">Editar</a></td>
                  <td>  <a href="excluir.php?id=<?=$usuario['id'];?>">Excluir</a></td> 

              </tr>
    
            <?php endforeach; ?>
            </table>
            </div>
    <div class="btn"> 
    <button><a href="cadastrar.php">Cadastrar usuário</a></button>
    </div>
 
    
</body>
</html>