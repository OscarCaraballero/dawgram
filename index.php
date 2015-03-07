<?php
//phpinfo();



define("RUTA",dirname(__FILE__));

//Incluimos el FrontController
require_once 'libs/FrontController.php';
//Lo iniciamos con su método estático main.
FrontController::main();
