<?php

    namespace App\Controllers;

    
    use App\Registry;
    use App\Controller;

class CursosController {

        public function index()
        {
            $quer = Registry::get("database");
            $sql = "SELECT * FROM curso";
            $execute = $quer->query($sql);
            $execute->execute();
            $fila = $execute->fetchAll();

            //Matriculado
            $quer2 = Registry::get("database");
            $sql2 = "SELECT * FROM matricula where iduser = :iduser";
            $execute2 = $quer2->query($sql2);
            $execute2->execute([":iduser" => $_COOKIE["username"]]);
            $fila2 = $execute->fetchAll();
            

            $quer3 = Registry::get("database");
            $sql3 = "SELECT * FROM user where id=:id";
            $execute3 = $quer3->query($sql3);
            $execute3->execute([":id" => $_COOKIE["username"]]);
            $fila3 = $execute3->fetch();

            return view('cursos', ["cursos"=>$fila, "matriculado"=>$fila2, "user"=>$fila3]);
        }

        public function matricularse(){
            $curso = filter_input(INPUT_POST, "cursoopcion");
            $quer3 = Registry::get("database");
            $sql3 = "INSERT INTO matricula (iduser,idcurso) VALUES(:iduser, :idcurso)";
            $execute3 = $quer3->query($sql3);
            $execute3->execute([":iduser" => $_COOKIE["username"], ":idcurso"=>$curso]);

            Controller::redirection("cursos");
        }
        public function borrarAsignatura(){
            $curso = filter_input(INPUT_POST, "cursoopcion");
            $quer3 = Registry::get("database");
            $sql3 = "DELETE FROM curso where id=:id";
            $execute3 = $quer3->query($sql3);
            $execute3->execute([":id" => $curso]);

            Controller::redirection("cursos");
        }
        public function addAsignatura(){
                $tema = filter_input(INPUT_POST, "cursoopcion");
                $idprofe = filter_input(INPUT_POST, "idprofe");
                $quer3 = Registry::get("database");
                $sql3 = "INSERT INTO curso (tema,idprofe) VALUES(:tema, :idprofe)";
                $execute3 = $quer3->query($sql3);
                $execute3->execute([":tema" =>$tema, ":idprofe"=>$idprofe]);
    
                Controller::redirection("cursos");
        }
    }