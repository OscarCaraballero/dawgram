<?php

require_once 'Controller.php';

class LogoutController extends Controller{
    function process(){
        session_destroy();
        header("Location: /Dawgram");
    }
}
