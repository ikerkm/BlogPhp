<?php 
namespace App\controllers;
use App\DoctrineManager;
use Kint;
class RegisterController extends Controller {


    public function index(){

        $this->viewManager->renderTemplate("register.view.html");
    }

    public function register(DoctrineManager $doctrine){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['passwd'];

        $user = new \App\models\entities\User();
     //$user = $doctrine->em->getRepository(\App\models\entities\User::class);
     $user->name = $name;
     $user->email= $email;
     $user->password = sha1($password);
     
    $doctrine->em->persist($user);
    $doctrine->em->flush();
     Kint::dump($user);  
    }
}