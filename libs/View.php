<?php

class View {
    private $_controlador;
    public $title;    
    private $header;   
    private $footer;  
    private $_layoutParams;
    
    
    public function __construct() {
        $uri = explode('/',$_SERVER["REQUEST_URI"]);
        $uri = array_pop($uri);
        
        /*if (!empty($_GET['command']))
            $this->_controlador = $_GET['command'];
        else
            $this->_controlador = "Main";*/
        
        if (!empty($uri))
            $this->_controlador = $uri;
        else
            $this->_controlador = "Inicio";
        
        $this->title = "Canaryfly";
        $this->header = "view/". "header.php";
        $this->footer = "view/". "footer.php";
        
        $this->layoutParams = array (
            'ruta_css' => "view/". "css/",
            'ruta_img' => "view/". "images/",
            'ruta_js' =>  "view/". "js/"
        );
    }
    
    public function render($data = array()){ 
        echo self::setParamsCss();
        echo self::setParamsScripts();
        echo self::setParamsImages();
        $rutaVista = 'view/' . $this->_controlador . 'View' . '.php';
        if (is_readable($rutaVista)){
            require_once $this->header;
            require_once $rutaVista;
            require_once $this->footer;
        } else {
            throw new Exception('View exception: '.$rutaVista.' no es accesible');
        }
    }

    // Indicar el titulo de la vista
    public function setTitle($title){
        $this->title = $title;
    }
    
    // Por si se desea usar un header o un footer distinto.
    // Es necesario poner la ruta completa.
    public function setHeader($header){
        $this->header = $header;
    }
    
    public function setFooter($footer){
        $this->footer = $footer;
    }
    
    // Para modificar los parametros del layout.
    // Con la opcion "all" pasamos a modificar los 3 parametros (ruta_css, ruta_js y ruta_img)
    // y, por lo tanto, $paramas es un array.
    // Si indicas, por ejemplo, la opcion "ruta_css", la variable $paramas setá 
    // una string con la ruta de ese único campo.
    public function setParamsScripts(){
        $scripts = "";
        $scripts.= '<script src="'. $this->layoutParams['ruta_js'] .'jquery-1.8.3.min.js"></script>';
        $scripts.= '<script src="'. $this->layoutParams['ruta_js'] .'jquery-ui.min.js"></script>';
        $scripts.= '<script src="'. $this->layoutParams['ruta_js'] .'jquery.dataTables.min.js"></script>';
        $scripts.= '<script src="'. $this->layoutParams['ruta_js'] .'chosen.jquery.min.js"></script>';
        $scripts.= '<script src="'. $this->layoutParams['ruta_js'] .'chosen.proto.min.js"></script>';
        return $scripts;
    }
    
    public function setParamsImages(){
        $images = "";
        $images.= '<link rel="shortcut icon" href="'. $this->layoutParams['ruta_img'] .'favicon.ico">';
        return $images;
    }
    
    public function setParamsCss(){
        $css = "";
        $css .= '<link rel="stylesheet" type="text/css" href="'. $this->layoutParams['ruta_css'] .'unsemantic.css">';
        $css .= '<link rel="stylesheet" type="text/css" href="'. $this->layoutParams['ruta_css'] .'jquery.dataTables.min.css">';
        $css .= '<link rel="stylesheet" type="text/css" href="'. $this->layoutParams['ruta_css'] .'jquery-ui.min.css">';
        $css .= '<link rel="stylesheet" type="text/css" href="'. $this->layoutParams['ruta_css'] .'style_admin.css">';
        $css .= '<link rel="stylesheet" type="text/css" href="'. $this->layoutParams['ruta_css'] .'reset.css">';
        $css .= '<link rel="stylesheet" type="text/css" href="'. $this->layoutParams['ruta_css'] .'style.css">';
        $css .= '<link rel="stylesheet" type="text/css" href="'. $this->layoutParams['ruta_css'] .'chosen.min.css">';
        return $css;
    }
}