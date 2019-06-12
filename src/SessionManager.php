<?php
namespace App;
class SessionManager
{
    public function put (string $variable,$value){
        $_SESSION[$variable]= serialize($value);
    }

    public function get(string $variable){
       if(!isset($_SESSION[$variable])){
         return FALSE;
       }else{
        return unserialize($_SESSION[$variable]);}
    }
    public function remove(string $variable){
        unset($_SESSION[$variable]);
    }
}