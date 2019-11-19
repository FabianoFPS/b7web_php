<?php

class HGAPI {

     private $key        = null;
     private $uriBase    = null;
     private $error      = false;

     /**
     * @param String $key Chave de autenticação
     * @param String $uriBase
     * @return
     */
     public function __construct(string $uriBase, string $key = null){
     
          if( !empty($key) ) $this->key = &$key;
          
          $this->uriBase = &$uriBase;
     }

     /**
     * @param String $endPoint
     * @param Array $params
     * @param String $format Opcional, padrão json
     * @return
     */
     private function request(string $endPoint = '', array $params = array(), string $format = "json" ){
     
          $uri = $this->uriBase.$endPoint."?key=".$this->key."&format=".$format;

          
          foreach ($params as $key => $value) {
               
               if( empty($value) ) continue;

               $uri .= '&'.$key."=".urlencode($value);
          }
          
          $response = @file_get_contents($uri);
  
          return json_decode($response, true);
     }

     /**
     * @param
     * @return
     */
     public function is_error(){
     
          return $this->error;
     }

     /**
     * Cotação do Dollar
     * @return Array ou false caso ocorra algum erro
     */
     public function dolarQuotation(){
     
          $date = $this->request('finance/quotations');

          if( empty($date) or !is_array( $date['results']['currencies']['USD'] ) ){

               $this->error = true;
               return false;
          }

          return $date['results']['currencies']['USD'];
     }

}