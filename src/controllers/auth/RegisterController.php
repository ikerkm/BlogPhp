<?php 
namespace App\controllers\auth;
use App\controllers\Controller;
use App\DoctrineManager;

use Kint;
class RegisterController extends Controller {

private $error;
    public function index(){
        $this->error = null;
        $this->viewManager->renderTemplate("auth/register.view.html",['error'=>$this->error]);
    }

    public function register(DoctrineManager $doctrine){
        $is_verified = false;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['passwd'];
        $password2 = $_POST['passwd2'];
        $emailVerificator = $this->verificationManager->verifyEmail($email);
        $nameVerificator = $this->verificationManager->verifyName($name);
        $passVerificator = $this->verificationManager->verifyPassword($password,$password2);
        if($emailVerificator && $nameVerificator && $passVerificator){
            $user = new \App\models\entities\User();
            $user->name = $name;
            $user->email= $email;
            $user->password = sha1($password);
            $doctrine->em->persist($user);
            $doctrine->em->flush();
        
        
        }
       else{
            $this->error = "Invalid credentials.";
            $this->viewManager->renderTemplate("auth/register.view.html",['error'=>$this->error,'email'=>$email,'name'=>$name]);
        }
      

       
     //$user = $doctrine->em->getRepository(\App\models\entities\User::class);
   
  //   Kint::dump($user);  
    }
}