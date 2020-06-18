<?php
class Model {

    protected PDO $conexao;

    function __construct(){

        global $pdo;
        $this->comexao = $pdo;
    }

    protected function executaSQL(string $sql, array $parametros = null): PDOStatement{

        $statement = $this->comexao->prepare($sql);

        // if( isset($parametros) ){

        //     $statement->execute($parametros);
        // }else{

        //     $statement->execute();
        // }

        // return $statement;

        $statement->execute($parametros);
        return $statement;
    }
}