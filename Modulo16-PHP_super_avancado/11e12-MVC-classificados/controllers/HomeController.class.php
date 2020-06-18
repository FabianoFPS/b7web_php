<?php
class HomeController extends Controller{

    function index(array $params = null){

        $dados = array();

        $this->loadTemplate('home', $dados);
    }

}