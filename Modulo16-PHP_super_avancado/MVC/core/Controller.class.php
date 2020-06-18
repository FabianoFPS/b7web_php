<?php
class Controller {

    const PASTA_VIEW = "views";
    const TEMPLATE = "template.php";
    const CAMINHO_COMPLETO = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR.Controller::PASTA_VIEW.DIRECTORY_SEPARATOR;

    function loadView($viewName, $viewData = array()){

        extract($viewData);

        require_once "./views/$viewName.php";
    }

    function loadTemplate($viewName, $viewData = array()){

        require_once Controller::CAMINHO_COMPLETO.Controller::TEMPLATE;
    }

    function loadViewTemplate($viewName, $viewData = array()){

        extract($viewData);

        require_once Controller::CAMINHO_COMPLETO."$viewName.php";
    }
}