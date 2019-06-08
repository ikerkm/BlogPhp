<?php
namespace App;


class VerificationManager {



public function verifyEmail($email){

    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
   }
   
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
}



}









}