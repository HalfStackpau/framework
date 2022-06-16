<?php

    namespace App\Controllers;

    
    use App\Registry;

class ProfileController {

        public function index()
        {
            $quer = Registry::get("database");
            
            $sql = "SELECT * FROM user where id=:iduser";
            $execute = $quer->query($sql);
            $execute->execute([":iduser" => $_COOKIE["username"]]);
            $tarea = $execute->fetch();
            return view('profile', ["tarea"=>$tarea]);
        }
    }