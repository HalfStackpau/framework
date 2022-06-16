<?php

    namespace App\Controllers;

    
    use App\Registry;
    use App\Controller;

class DashboardController {

        public function index()
        {

            $quer = Registry::get("database");
            $sql = "SELECT * FROM list where iduser=:iduser";
            $execute = $quer->query($sql);
            $execute->execute([":iduser" => $_COOKIE["username"]]);
            $fila = $execute->fetchAll();

            $quer2 = Registry::get("database");
            $sql2 = "SELECT * FROM user where id=:id";
            $execute2 = $quer2->query($sql2);
            $execute2->execute([":id" => $_COOKIE["username"]]);
            $fila3 = $execute2->fetch();
            // foreach($fila as $row){
            //     print_r($row[0]);
            // }
            if($_COOKIE["lista"] != null){
               $sql2 = "SELECT * FROM task where idlist=:idlist";
               $execute = $quer->query($sql2);
               $execute->execute([":idlist" => $_COOKIE["lista"]]);
               $tarea = $execute->fetchAll();

 

               return view('dashboard', ["fila"=>$fila, "task"=>$tarea, "user"=>$fila3]);
            }
            
            return view('dashboard', ["fila"=>$fila, "user"=>$fila3]);
            
        }

        public function createList(){
            $quer = Registry::get("database");
            $sql = "INSERT INTO list (iduser) VALUES(:iduser)";
            $execute = $quer->query($sql);
            $iduser = $_COOKIE["username"];
            $execute->execute([":iduser" => $iduser]);
            Controller::redirection("dashboard");
        }

        public function newTask(){
            $lista = filter_input(INPUT_POST, "numberlist");
            $tarea = filter_input(INPUT_POST, "tarea");

            $quer = Registry::get("database");
            $sql = "INSERT INTO task (description, idlist) VALUES(:description, :idlist)";
            $execute = $quer->query($sql);
            $execute->execute([":description"=>$tarea, ":idlist"=>$lista]);
            Controller::redirection("dashboard");
        }
        public function getLista(){
            $lista = filter_input(INPUT_POST, "numberlist");

            setcookie("lista", $lista, time()+365*24*60*60, '/');
            Controller::redirection("dashboard");
            
        }
    }