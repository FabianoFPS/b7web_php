<?php
class Usuarios {

     private $banco = null;

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
     
          $sql = "13,55";
     }
}