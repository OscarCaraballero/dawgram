<?php
//require_once 'model/DatabaseManager.php';
require_once 'Controller.php';
require_once 'db/medoo.min.php';

class InicioController extends Controller {
    function process() {
        $bbdd = new medoo();
        $send = $bbdd->select("images", "path");
        $this->_view->render($send);
    }
}
