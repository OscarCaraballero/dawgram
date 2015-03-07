<?php

require_once 'libs/View.php';

abstract class Controller {

    protected $_view;

    public function __construct() {
        $this->_view = new View();
    }

    abstract public function process();
}

