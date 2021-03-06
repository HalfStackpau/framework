<?php

namespace App;


use App\Request;
use App\Session;

class Controller{
    protected $request;
    protected $session;

    function __construct(Request $request, Session $session){
        $this->request = $request;
        $this->session = $session;
    }
    public static  function redirection($location){
        return header("location:" . "/" .$location);
        die;
    }
    function error($str)
    {
        Session::set('error', $str);
    }

}