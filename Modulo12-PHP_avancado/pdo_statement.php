<?php
/*
$this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "adm", "374937");
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/

class Usuarios{

     private $db;

     /**
     * @param
     * @return
     */
     public function __construct (){
     
          try {
               
               $this->db = new PDO("mysql:dbname=blog;host=localhost", "adm", "374937");
               $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          } catch (PDOException $exception) {
               
               echo $exception->getMessage();
          }
     }

     /**
     * @param
     * @return
     */
     public function selecionar (int $id){
     
          $statement = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
          //$statement->bindValue(":id", $id);
          $statement->bindParam(":id", $id); //-> Associa a variavel
          $id = 5;
          $statement->execute();

          $array = array();

          if ( $statement->rowCount() ) {
               
               $array = $statement->fetch();
          }

          return $array;
     }
}

$usuario  = new Usuarios();

print_r( $usuario->selecionar(13) );


