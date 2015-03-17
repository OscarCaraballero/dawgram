<?php

require_once 'Controller.php';
require_once 'db/medoo.min.php';

class LoginController extends Controller{
    function process(){
        $bbdd=new medoo();
        $errorMsg = array();
        
        if(isset($_POST['registro'])){
            $email = $_POST['email'];
            $pass = $_POST['contrasenaRegistro'];       
            $user = $_POST['usuario'];       
            if($comprueba = $bbdd->select("users", "*",[
                "email" => $email
            ])){
                header("Location: Inicio");
            }else{
                if($id = $bbdd->insert("users", [
                    "email" => $email,
                    "usuario" => $user,
                    "password" => $pass
                ])){
                    $_SESSION['username'] = $user;
                    $_SESSION['id'] = $id;
                    $_SESSION['filter'] = array();
                    $_SESSION['count'] = 0;
                    require 'libs/autoCache.php';
                    autoCache(); 
                    header("Location: Inicio");
                }else{
                    header("Location: /Dawgram");
                }
            }
        }else{
            $email = $_POST['email'];
            $pass = $_POST['contrasenaLogin'];       

            $query = "select * from users where email = '{$email}' and password = '{$pass}';";
            if($user = $bbdd->query($query)->fetchAll()){
                $_SESSION['username'] = $user[0]['usuario'];
                $_SESSION['id'] = $user[0]['id'];
                $_SESSION['filter'] = array();
                $_SESSION['count'] = 0;
                require 'libs/autoCache.php';
                autoCache(); 
                header("Location: Inicio");
            }else{
                array_push($errorMsg, "El usuario/contraseña no son los correctos.");
                $_SESSION['msg'] = $errorMsg;
                var_dump($_SESSION);
                header("Location: /Dawgram");
            }
        }
        
    }
}
