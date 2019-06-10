<?php
namespace App;
use \DI\Container;

class VerificationManager {



public function verifyEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
   }
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
}}


public function verifyName($name){
    $rexSafety = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#0-9]+/i";
if (preg_match($rexSafety, $name)) {
    return false;
} else {
    return true;
}

}
public function verifyPassword($pass1,$pass2){

    if ($pass1 === $pass2){
        return true;
    }else{
        return false;
    }
}





}