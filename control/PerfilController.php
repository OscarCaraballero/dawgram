<?php
//require_once 'model/DatabaseManager.php';
require_once 'Controller.php';
require_once 'db/medoo.min.php';

class PerfilController extends Controller {

    function process() {
        $bbdd = new medoo();
        $images = $bbdd->select("images", "*",[
            "idUser" => $_SESSION['id']
        ]);
        //var_dump($images);
        $this->_view->render(array($images));
    }
}
