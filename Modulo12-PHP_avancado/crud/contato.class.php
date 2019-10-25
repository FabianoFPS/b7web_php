<?php
/**
 * Contato: Manipula os contatos
 * @author Fabiano <fabiano@feevale.br>
 * @package
 */
class Contato{

     private $pdo;

     public function __construct(){
     
          $this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "adm", "374937");
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }

     /**
      * Adiciona Contatos, tabela crudoo.contatos
      * @param String $email E-mail.
      * @param string $nome Nome opcional.
      */
     public function adicionar(string $email, string $nome = ''){
     
          if ($this->existeEmail($email)) {
               
               return false;
          }

          $sql = "  SET @nome = :nome;
                    SET @email = :email;
                    INSERT INTO contatos (nome, email) 
                    VALUES (@nome, @email);";

          $sql = $this->pdo->prepare($sql);
          $sql->bindValue(':nome', $nome);
          $sql->bindValue(':email', $email);
          $sql->execute();
          $sql->closeCursor();

          return true;
     }

     /**
      * @param String $email E-mail identificador do cadastro.
      * @return String Nome ou vazio.
      */

     public function getNome(string $email){
     
          $sql = "  SET @email = :email;
                    SELECT nome 
                    FROM contatos 
                    WHERE email LIKE :email;";

          $variaveis = array(':email' => $email);

          $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          while ($statement->rowCount() == 0 &&  $statement->nextRowset()){}
          
          if (!$statement->rowCount()) {
 
               return '' ;
          }
          
          $info = $statement->fetch();
          $statement->closeCursor();

          return $info['nome'];
     }
     
     /**
      * @return Array Retorna todos os registros da tabela contatos.
     */
     public function getAll(){
     
          $sql = "SELECT * FROM `contatos` WHERE 1";
          $statement = $this->pdo->query($sql);

          if (!$statement->rowCount()) {
               
               return array();
          }

          // $retorno = $statement->fetchAll();
          // $statement->closeCursor();
          // return $retorno;
          return $statement;
     }

     private function existeEmail(string $email){
     
          $sql = "SELECT * FROM contatos WHERE email LIKE :email";

          $sql = "  SET @email = :email;
                    SELECT * 
                    FROM contatos 
                    WHERE email LIKE @email";

          $variaveis = array(':email' => $email);

          $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          while ($statement->rowCount() == 0 &&  $statement->nextRowset()){}

          if ($statement->rowCount()) {
               
               $statement->closeCursor();
               return true;
          }
          $statement->closeCursor();
          return false;
     }

     /**
     * Altera o Nome do contato.
     * @param string $nome Nome a ser alterado
     * @param String $email Identificador
     * @return Boolean
     */
     public function editar(string $nome, string $email){
     
          if (!$this->existeEmail($email)) {
               
               return false;
          }

          $sql = "  SET @novo_nome = :novo_nome;
                    UPDATE `contatos` 
                    SET `nome`= @novo_nome 
                    WHERE `email` LIKE :email";

          $variaveis = array( ':novo_nome' => $nome,
                              ':email' => $email);

          $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);
          $statement->closeCursor();
          return true;
     }

     /**
     * @param
     * @return
     */
     public function excluir(string $email){
     
          if (!$this->existeEmail($email)) {
               
               return false;
          }

          $sql = "DELETE FROM `contatos` WHERE `email` LIKE :email";

          $variaveis = array(':email' => $email);

          $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);
          $statement->closeCursor();
          return true;
     }

     /**
     * @param Int $id 
     * @return
     */
     public function excluirPorId(int $id){
     
          $sql = "  SET @id = :id;
                    DELETE
                    FROM contatos 
                    WHERE id = @id;";
          $variaveis = array(':id' => $id);

          $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);
          $statement->closeCursor();
     
     }

     /**
     * Consulta dados
     * 
     * @param Int $id
     * @return Array
     */
     public function getInfo(int $id){
     
          $sql = "  SET @id = :id;
                    SELECT *
                    FROM contatos
                    WHERE id = @id;";

          $variaveis = array(':id' => $id);

          $info = array();

          $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);
          
          while ($statement->rowCount() == 0 &&  $statement->nextRowset()){}
          if( $statement->rowCount() > 0 ){

               $info = $statement->fetch();
          }
          
          $statement->closeCursor();

          return $info;
     }
}
