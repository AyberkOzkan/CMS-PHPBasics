<?php 

namespace Core;

class Session{

    public static function getSession($name){
        return $_SESSION[$name] ?? false;

        // return isset($_SESSION[$name] ? $_SESSION[$name] : false);
    }
    
    public static function setSession($name, $value){
        
        $_SESSION[$name] = $value;
    }
    
}



?>