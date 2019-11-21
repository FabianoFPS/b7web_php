<?php
class Usuarios {

     private $banco = null;
     private $id = null;
     private $permissoes = array();

    /**
    * @param
    * @return
    */
    public function __construct(BD $banco){
    
         $this->banco = $banco;
    }
     /**
     * @param String $login
     * @param String $senha
     * @return
     */
     public function fazerLogin(string $login, string $senha){
     
          $sql = "SELECT *
                    FROM usuarios
                    WHERE email = :email
                    AND senha = :senha;";

          $parametros = array(":email" => &$login,
                              ":senha" => &$senha);

          $resultado = $this->banco->execBDv2($sql, $parametros);

          var_dump($resultado);

          if ( $resultado['retorno'] == true and isset($resultado['info']) ){

               $_SESSION['logado'] = $resultado['info'][0]['id'];
               $_SESSION['permissoes'] = $resultado['info'][0]['permissoes'];
               return true;
          }

          return false;
     }

     /**
     * Descrição setUsuario: 
     * @param Int $id
     * @return
     */
     public function setUsuario(int $id){
     
          $this->id = $id;
          $this->permissoes = explode(',', $_SESSION['permissoes']);

          //var_dump( $this->permissoes );
     }

     /**
     * ...
     * 
     * @return Array
     */
     public function getPermissoes(){
     
          return $this->permissoes;
     }

     /**
     * ...
     * @param
     * @return
     */
     public function temPermissao(string $permissao){
     
          if( in_array($permissao, $this->permissoes) ) {

               return true;
          }

          return false;
     }
}