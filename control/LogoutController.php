<?php

require_once 'Controller.php';

class LogoutController extends Controller{
    function process(){
        session_destroy();
        require 'libs/autoCache.php';
        autoCache(); 
        header("Location: /Dawgram");
    }
}
