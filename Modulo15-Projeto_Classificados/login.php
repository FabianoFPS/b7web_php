<?php 
require_once 'pages/header.php';

$alertLogin = 'hidden';

if( filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ){

  logar();
}

function logar(){

  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

  $usuario = new Usuario();
  
  if( !$usuario->login($email, $senha) ){

    global $alertLogin;
    $alertLogin = 'show';
    return false;
  }

  echo "<script>window.location.href=\"./index.php\"</script>";

}

?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-m-6">
        <br>
        <h3>Login:</h3>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-m-6">
      <div class="alert alert-danger" role="alert" <?php echo $alertLogin; ?>>
        Login inválido!
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form method='POST'>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
<?php require_once 'pages/footer.php'; ?>