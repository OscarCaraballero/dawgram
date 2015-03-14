<?php
//require_once 'model/DatabaseManager.php';
require_once 'Controller.php';
require_once 'db/medoo.min.php';

class PerfilController extends Controller {

    function process() {
        
        $bbdd = new medoo();
        $images = $bbdd->select("images", "*",[
            "idUser" => 1
        ]);
        $this->_view->render(array($images));
    }
}
