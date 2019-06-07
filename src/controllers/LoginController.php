<?php 
namespace App\controllers;
use App\DoctrineManager;
use Kint;
use App\models\entities\User;
class LoginController extends Controller {

private $error;
    public function index(){
        $this->error = null;
        $this->viewManager->renderTemplate("Login.view.html",['error'=>$this->error]);
    }

    public function login(DoctrineManager $doctrine){
        

        $email = $_POST['email'];
        $password = $_POST['passwd'];
        
        $user =new User();
     //$user = $doctrine->em->getRepository(\App\models\entities\User::class);
  
     $user->email= $email;
     $user->password = sha1($password);
   // Kint::dump($user);
  // $user  ->findOneBy(array('email' => $email));
     //   $user = $doctrine->em->getRepository(User::class);
    /*  $user_match = $user->findOneByEmail();*/
   // $user_match =  $user->findBy(array('email' =>$email,'password'=>$password));
  $user_match =  $doctrine->em->getRepository('\App\models\entities\User')->findBy(array('email' =>$user->email,'password'=>$user->password));
// Kint::dump($user->findBy(array('email' =>$email,'password'=>$password)));

   if (!$user_match) {
     $this->error="El usuario no eiste";
       $this->viewManager->renderTemplate("Login.view.html",['error'=>$this->error,'email'=>$email]);
    }
    $this->redirectTo('');
   // findBy(array($user->email ) );    findOneBy('\App\models\entities\User',$user->email) )   
  //  getRepository(User::class)->find(56);
    }

}