<?php
require_once 'BD.generico.class.php';

class Language{

     private $language_padrao;
     private $ini;
     private $db;
     private $SQL_S = "SELECT nome, valor FROM lang WHERE lang = :lang";
     private $traducao = array();

     public function __construct(){
     
          $this->language_padrao = 'pt-br';

          if(  isset($_SESSION['lang']) and // existe a variavel de sessão $_SESSION['lang'] de sessão
               !empty($_SESSION['lang']) and // empty = vazio. !empty = não vazio
               file_exists( 'lang/'.$_SESSION['lang'].'.ini') ){ // existe arquivo ?.ini

               $this->language_padrao = $_SESSION['lang'];
          }

          $this->ini = parse_ini_file("lang/$this->language_padrao.ini");

          $this->db = new BD('projeto_multilinguagem');
          $retornoBD = $this->db->execBD($this->SQL_S, array(':lang' => &$this->language_padrao));

          //var_dump($retornoBD);

          foreach ($retornoBD as $key => $value) {

               //echo $value['nome'].' - '.$value['valor'].'<br>';
               $this->traducao[$value['nome']] = $value['valor'];
          }

          // var_dump($this->traducao);
          // echo $this->traducao['clothes'];
     }

     /**
     * @param
     * @return
     */
     public function get(string $word, bool $exibe = false){

          $texto = ( isset($this->ini[$word]) )?$this->ini[$word] : $word;
     
          if($exibe){
               
               echo $texto;
          }

          return $texto;
     }

     /**
     * @param
     * @return
     */
     public function getBanco(string $palavra){
          
          return ( isset($this->traducao[$palavra]) )? $this->traducao[$palavra] : $palavra; 
     }

     /**
     * @param
     * @return String
     */
     public function getLanguage(){
     
          return $this->language_padrao;
     }
}