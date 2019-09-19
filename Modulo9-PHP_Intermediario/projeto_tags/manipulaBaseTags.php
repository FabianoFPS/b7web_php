<?php
require_once 'conexaoBD.php';

class ManipulaBaseTags {

     private $parametros = array('mysql', 'projeto_tags', 'localhost', 'adm', '374937');
     private $conexao;

     function __construct(){

          $this->conexao = new ConexaoBancoDeDados($this->parametros);
     }

     function getCaracteristicas(){

          $sql = "SELECT caracteristicas FROM usuarios ; ";

          return $this->conexao->consulta($sql);
     }
}