<?php
require_once 'config.php';

class Usuario {

    function login(string $email, string $senha): bool{

        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha", 
            array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $senhaMd5 = md5($senha);

        $sql->execute(array(':email' => &$email,
                            ':senha' => &$senhaMd5,
        ));

        if ( !$sql->rowCount() ){
            
            return false;
        } 
        
        $dado = $sql->fetch();

        $_SESSION['cLogin'] = $dado['id'];

        return true;

    }

    function verificaEmailDuplicado(string $email): bool{

        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        $count = $sql->rowCount();
        unset($sql);
        return ( $count == 0 )? false : true;
    }

    function cadastrar (array $dados): bool{

        global $pdo;

        if( !$this->verificaEmailDuplicado( $dados['email'] ) ){

            $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

            $senhaMd5 = md5($dados['senha']);

            $sql->execute(array(':nome'     => $dados['nome'],
                                ':email'    => $dados['email'],
                                ':senha'     => &$senhaMd5,
                                ':telefone' => $dados['telefone']
            ));
            
            unset($sql);
            return true;

        }else{
            
            unset($sql);
            return false;
        }
    }
}
