<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'Controller.php';
require_once 'db/medoo.min.php';

class ShowController extends Controller{
    function process() {
        $bbdd = new medoo();
        
//        var_dump($_POST);

        
        $image = $bbdd->select("images", "path",[
           "id" => $_POST['id'] 
        ]);
        
//        var_dump($bbdd->last_query());
//        die();
        $this->_view->render($image);
    }
}
