<?php
echo "estoy aqui";
//require_once 'model/DatabaseManager.php';
require_once 'Controller.php';

class InicioController extends Controller {

    function process() {
        $this->_view->render([]);
    }
}
