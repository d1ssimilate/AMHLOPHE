<?php

class MainController extends Controller {
    function __construct() {
        $this->model = new Model;
        $this->view = new View;
    }

    function getIndex() {
        $this->view->generate('index', 'main');
    }

    function getCatalog() {
        $this->view->generate('catalog', 'main');

    }
    
    
}