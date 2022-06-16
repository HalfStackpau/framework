<?php

    namespace App\Controllers;

    
    use App\Registry;
    use App\Controller;
    use App\Session;

class LoginController {

        public function index(){

            return view('index');
        }

        public function login(){
            $email = filter_input(INPUT_POST, "email");
            $passwd = filter_input(INPUT_POST, "password");
            if($email == "" or $passwd == ""){
                Controller::redirection("");
            }

            $db = Registry::get("database");
            $sql = "SELECT * from user WHERE email=?; LIMIT 1";
            
            $stmt = $db->query($sql);
            $stmt->execute([$email]);
            $fila = $stmt->fetch();

            $pass = password_verify($passwd, $fila['passwd']);

            if(!$pass or $fila === null){
                Controller::redirection("");
                $_COOKIE["prueba"] = "prueba";
                return;
            }
            
            $_SESSION["email"] = $email;
            $_SESSION["rol"] = $fila["rol"];
            setcookie("username", $fila["id"], time()+365*24*60*60, '/');
            Controller::redirection("dashboard");

        }
    }