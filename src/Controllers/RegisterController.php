<?php

    namespace App\Controllers;

    
    use App\Registry;
    use App\Controller;
    use App\Database\Connection;
    use App\Request;
    use App\Session;

class RegisterController extends Controller{
    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }

        public function index()
        {
            $roles = Registry::get('framework')->selectAll('roles');
            
            return view('index', compact('roles'));
        }
        public function register(){
            try{
                $email = filter_input(INPUT_POST, "email");
                $username = filter_input(INPUT_POST, "username");
                $passwd = filter_input(INPUT_POST, "password");
                $rol = 1;
                if($email == "" or $passwd == "" or $username == ""){
                    $this->redirection("");
                }
                $quer = Registry::get("database");
                $sql = "INSERT INTO user (username, email, passwd, rol) VALUES(:username, :email, :passwd, :rol)";
                
                $execute = $quer->query($sql);
                $opciones = ['cost' => 6];
                $hashed = password_hash($passwd, PASSWORD_DEFAULT, $opciones);
                $execute->execute([":username" => $username,":email" => $email, ":passwd" => $hashed, ":rol" => $rol] );

            }catch(\PDOException $e){
            
                die($e->getMessage());
            }
            $this->redirection("");
        }
    }