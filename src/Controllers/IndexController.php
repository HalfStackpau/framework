<?php

    namespace App\Controllers;

    
    use App\Registry;

class IndexController {

        public function index()
        {
            $roles = Registry::get('database')->selectAll('roles');
            
            return view('index', compact('roles'));
        }
    }