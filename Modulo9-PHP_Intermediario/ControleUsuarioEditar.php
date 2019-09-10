<?php
require_once 'configPDOMySql.php';

if (isset($_POST['atualizar'])) {
     
     $nome = addslashes($_POST['nome']);
     $email = addslashes($_POST['email']);
     $id = addslashes($_POST['id']);
     echo $nome.$email;

     $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id;";
     $variaveis = array (':id'     => &$id,
                         ':nome'   => &$nome,
                         ':email'  => &$email);
     
     try {

          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          header('Location: ControleUsuriosHTML.php');

     } catch (PDOExcepction $exception) {
          
          $mensagemErroPDO = $exception->getMessage();
          echo "Excessão: $mensagemErroPDO.";
     }
}

if(isset($_GET['id']) && !empty($_GET['id'])){

     $id = addslashes($_GET['id']);
     $variaveis = array (':id' => &$id);
     $sql = "SELECT id, nome, email, senha FROM usuarios WHERE id = :id";

     try {
          
          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          if($statement->rowCount()> 0){
               $dados = $statement->fetch();
          }else {
               header('Location: ControleUsuriosHTML.php');
          }

     } catch (PDOExcepction $exception) {
          
          $mensagemErroPDO = $exception->getMessage();
          echo "Excessão: $mensagemErroPDO.";
     }

}else {
     header('Location: ControleUsuriosHTML.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Editor</title>
</head>
<body>
     <form action="" method="post">
          Nome: <br>
          <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
          <input type="text" name="nome" id="id_nome" value="<?php echo $dados['nome']; ?>"> <br><br>
          E-mail: <br>
          <input type="email" name="email" id="id_email" value="<?php echo $dados['email']; ?>"> <br><br>
          <!-- Senha: <br>
          <input type="password" name="senha" id="id_senha" > <br><br> -->
          <input type="submit" name="atualizar" value="Atualizar">
     </form>
</body>
</html>