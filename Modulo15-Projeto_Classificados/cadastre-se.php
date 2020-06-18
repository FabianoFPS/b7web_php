<?php 
require_once 'pages/header.php'; 

$mostraSuccess = "hidden";
$alertEmailDuplicado = "hidden";
$mostraAlerta = "hidden";
$alertEmailFormatoInvalido = "hidden";

if( verificaEmail() ){

    $mostraAlerta = (cadastra($_POST))? "hidden" : "show" ;
}

$action = $_SERVER['PHP_SELF'];

function verificaEmail(): bool{
    if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ){ 
        
        global $alertEmailFormatoInvalido;

        $alertEmailFormatoInvalido = (isset($_POST['email']))? 'show' : 'hidden';
        return false; 
    }
    $email = filter_input(INPUT_POST, 'email',     FILTER_SANITIZE_EMAIL);
    
    $usuario = new Usuario();
    $duplicado = $usuario->verificaEmailDuplicado($email);
    unset($usuario);

    global $alertEmailDuplicado;

    if($duplicado){ $alertEmailDuplicado = 'show'; }

    return !$duplicado;
}

function cadastra (array $info){

    // $email = $info['email'] ?? false;

    // if(!$email){

    //     return;
    // }
   
    // $dados['email'] = $email;
    // $dados['nome'] = addslashes($info['nome']);
    // $dados['senha'] = addslashes($info['senha']);
    // $dados['telefone'] = addslashes($info['telefone']);

    //Apenas como exemplo que retorna o dado, $dados['email'] =  
    if(!$dados['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ){ return false; }

    $dados['email']     = filter_input(INPUT_POST, 'email',     FILTER_SANITIZE_EMAIL);
    $dados['nome']      = filter_input(INPUT_POST, 'nome',      FILTER_SANITIZE_SPECIAL_CHARS);
    $dados['senha']     = filter_input(INPUT_POST, 'senha',     FILTER_SANITIZE_SPECIAL_CHARS);
    $dados['telefone']  = filter_input(INPUT_POST, 'telefone',  FILTER_SANITIZE_SPECIAL_CHARS);

    //$GLOBALS['infoVazia'] = false;
    $infoVazia = false;
    
    array_map(function ($dado) {
        
        if(empty($dado)) { 
            
            // global $GLOBALS;
            // $GLOBALS['infoVazia'] = true;
            global $infoVazia;
            $infoVazia = true;
        }
    } , $dados);

 
    if( $infoVazia ) { return false; }

    $usuario = new Usuario();
    global $mostraSuccess;

    if( !$usuario->cadastrar($dados) ){
        
        $mostraSuccess = "hidden";
        unset($usuario);
        return false;
    }

    $mostraSuccess = "show";
    unset($usuario);
    return true;
}
?>
<div class="container">
    <div class="row">
        <div class="col-md">
            <br>
            <div class="alert alert-danger" role="alert" <?php echo $mostraAlerta; ?> >
                Cadastro inválido, observe os campo obrigatórios
            </div>
            <div class="alert alert-danger" role="alert" <?php echo $alertEmailDuplicado; ?> >
                Já existe cadastro com o e-mail: <?php echo filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)?>
            </div>
            <div class="alert alert-danger" role="alert" <?php echo $alertEmailFormatoInvalido; ?> >
                Email com formato inválido!
            </div>
            <!-- $alertEmailFormatoInvalido -->
            <div class="alert alert-success" role="alert" <?php echo $mostraSuccess; ?>>
                <strong>Parabéns!</strong> Cadastrado com sucesso.
                <a href="login.php" target="_blank" rel="noopener noreferrer" class="alert-link"></a>
                </div>
            <h1>Cadastre-se</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <form method='POST' action="<?php echo $action; ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="senha" id="inputPassword4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Nome</label>
                    <input type="text" class="form-control" id="inputAddress" name="nome" placeholder="">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Telefone</label>
                    <input type="text" class="form-control" id="inputAddress2" name="telefone" placeholder="(DDD) ">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Não implementado">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>Não implementado</option>
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Não implementado">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-outline-dark">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'pages/footer.php'; ?>