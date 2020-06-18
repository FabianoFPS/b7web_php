<?php
class HomeController extends Controller{

    function index(array $params = null){

        $anuncios = new Anuncios();
        $usuarios = new Usuarios();

        $dados = array (
            'parametro1' => "Frase passada por parametro",
            'quantidade' => $anuncios->getQuantidades()
        );

        $this->loadTemplate('home', $dados);
    }

}