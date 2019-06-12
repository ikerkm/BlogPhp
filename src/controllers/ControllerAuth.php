<?php
namespace App\controllers;
use App\VerificationManager;
use App\ViewManager;
use App\LogManager;

use App\SessionManager;
use DI\Container;
use App\DoctrineManager;
use App\services\UsersService;
use Kint;
abstract class ControllerAuth{
    protected $verificationManager;
    protected $container;
    protected $viewManager;
    protected $logger;
    protected $getUserData;
    protected $sessionManager;
    protected $user;
    protected $dataUser;
    protected $email;
    public function __construct(Container $container){
        $this->container = $container;
        $this->verificationManager = $this->container->get(VerificationManager::class);
        $this->viewManager = $this->container->get(ViewManager::class);
        $this->logger = $this->container->get(LogManager::class);
        $this->logger->info("Clase ".get_class($this)." cargada");
        $this->getUserData = $this->container->get(UsersService::class);
        $this->sessionManager = $this->container->get(SessionManager::class);
       
        if ($this->sessionManager->get('user'))
        {
        




          $this->auth();
        }else{
          //$this->noAuth();
        }
        
       
    }
    public abstract function index();
    public function redirectTo(string $page){

        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF'],'/\\'));
        header("Location: http://$host$uri/$page");
    }
   public function Auth(){

  $userService = $this->container->get(UsersService::class);
    $id = $this->sessionManager->get('user');
   
    if(!$id) return $this->redirectTo('login');
  $this->user = $userService->getUserById($id);

  $this->email =   $this->user->email;
    if(!$this->user) return $this->redirectTo('login');

   }
  
}