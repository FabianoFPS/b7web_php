<?php
require_once 'config.inc.php';

class Core {

    private $url;

    function __construct($url){

        $this->url = $url;
    }

    function run(){

        //echo $this->url;
        $opcao = array();
        $opcao = explode('/', $this->url);

        // switch ($opcao[0]) {
        //     case 'Home':
        //         echo 'Home';
        //         break;

        //     case 'galeria':
        //         print_r($opcao);
        //         break;
            
        //     default:
        //         $currentController = 'HomeController';
        //         $currentAction = 'index';
        //         break;
        // }

        // if( empty($opcao[0]) ){
            
        //     $currentController = 'HomeController';
        //     $currentAction = 'index';

        // } else{

        //     $currentController = $opcao[0].'Controller';

        //     $currentAction = $opcao[1]?? 'index';
        // }

        //$currentController = $opcao[0] ?? 'Home';
        $currentController = (!empty($opcao[0]))? $opcao[0] : 'Home';
        $currentController .= 'Controller';
        $currentAction = (!empty($opcao[1]))? $opcao[1] : 'index';
        //$currentAction = $opcao[1]?? 'index';
        $params = array_slice($opcao, 2);

        // echo "CONTROLER: $currentController <BR>ACTION: $currentAction<BR>PARAMETROS: ";
        //  print_r($params);
        //  echo gettype($params);
        //  echo "<hr>";

        $controller = new $currentController();

        call_user_func_array(array($controller, $currentAction), array($params));
    }
}