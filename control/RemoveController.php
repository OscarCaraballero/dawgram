<?php

require_once 'Controller.php';
require_once 'db/medoo.min.php';

class RemoveController extends Controller{
    function process() {
        require_once 'libs/autoCache.php';
        autoCache();
        $bbdd = new medoo();
        if($delete = $bbdd->delete("images", [
            "id" => $_SESSION['idFoto']
        ])){
            header("Location: Perfil");
        }else{
            header("Location: Perfil");
        }
    }
}