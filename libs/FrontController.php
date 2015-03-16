<?php

ini_set('session.gc_maxlifetime', 0);
session_set_cookie_params('0');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

class FrontController {

    static function main() {
        require_once 'libs/Config.php';
        require_once 'libs/conf.php';
        
        $uri = explode('/', $_SERVER["REQUEST_URI"]);
        
        $uri = array_pop($uri);
        
        if (!empty($uri)){
            $controllerName = $uri . 'Controller';
        }else
            $controllerName = "InitController";
        
        
        /* if (!empty($_GET['command']))
          $controllerName = $_GET['command'] . 'Controller';
          else
          $controllerName = "InitController"; */

        //Lo mismo sucede con las acciones, si no hay acción, tomamos index como acción
        /*  if(! empty($_GET['accion']))
          $actionName = $_GET['accion'];
          else
          $actionName = "index"; */
        $config = Config::singleton();
        $controllerPath = $config->get('controllersFolder') . $controllerName . '.php';
        //Incluimos el fichero que contiene nuestra clase controladora solicitada
        if (is_file($controllerPath))
            require_once $controllerPath;
        else
            die('El controlador no existe - 404 not found');

        //Si no existe la clase que buscamos y su acción, mostramos un error 404
        /* if (is_callable(array($controllerName, $actionName)) == false)
          {
          trigger_error ($controllerName . '->' . $actionName . '` no existe', E_USER_NOTICE);
          return false;
          } */
        //Si todo esta bien, creamos una instancia del controlador y llamamos a la acción
        $controller = new $controllerName();
        $controller->process();
        //$controller->$actionName();
        //$controller->process();
    }

}
