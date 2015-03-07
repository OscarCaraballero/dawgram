<?php
//phpinfo();
var_dump(__FILE__);
//define("RUTA",__FILE__);

//Incluimos el FrontController
require_once 'libs/FrontController.php';
//Lo iniciamos con su método estático main.
FrontController::main();
