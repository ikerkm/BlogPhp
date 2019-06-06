<?php 
namespace App\controllers;
use App\DoctrineManager;
use Kint;
class LoginController extends Controller {


    public function index(){

        $this->viewManager->renderTemplate("Login.view.html");
    }

    public function Login(DoctrineManager $doctrine){
        

        $email = $_POST['email'];
        $password = $_POST['passwd'];
        
        $user = new \App\models\entities\User();
     //$user = $doctrine->em->getRepository(\App\models\entities\User::class);
    
     $user->email= $email;
     $user->password = sha1($password);
    
  // $user  ->findOneBy(array('email' => $email));
  $user_match =  $doctrine->em->getRepository('\App\models\entities\User')->findBy(array('email' =>$user->email,'password'=>$user->password));
    if($user_match){
        echo "Logged in";
       
    }else{
        echo "Wrong credentials";
    }
   // findBy(array($user->email ) );    findOneBy('\App\models\entities\User',$user->email) )   
  //  getRepository(User::class)->find(56);
    }
}