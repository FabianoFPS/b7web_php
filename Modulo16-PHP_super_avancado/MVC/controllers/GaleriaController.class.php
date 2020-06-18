<?php

class GaleriaController extends Controller {

    function index(array $params = null){

        $dados = Array(
            'frase' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis doloribus error harum ipsa, nemo deleniti exercitationem, illo atque quos minus odit ipsam dolorem aperiam tempora ratione, adipisci sapiente. Odio, quasi."
        );

        $this->loadTemplate('galeria', $dados);
    }
}