<pre>
<?php
if(isset($_FILES['arquivos']) && count($_FILES['arquivos']['tmp_name'])>0) {
     
     echo print_r($_FILES);

     for($index = 0; $index < count($_FILES['arquivos']['tmp_name']); $index++){

          $localTempfile = $_FILES['arquivos']['tmp_name'][$index];
          $nameFile = 'files/['.md5(time().rand(0,99)).']'.$_FILES['arquivos']['name'][$index];
          
          move_uploaded_file( $localTempfile, $nameFile );
     }

}

?>
</pre>

<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Upload múltiplo de arquivo</title>
</head>
<body>
     <form action="" method="post" enctype="multipart/form-data">
          Arquivos: <br>
          <input type="file" name="arquivos[]" id="id_arquivo" multiple> <br><br>
          <input type="submit" value="Enviar Arquivos">
     </form>
</body>
</html>