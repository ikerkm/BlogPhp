<?php
namespace App\controllers;
use App\DoctrineManager;
use App\models\entities\Post;
use App\services\PostsService;
use Kint;
class NotFoundController extends ControllerAuth{
   
    public function index(){
     // $doctrineManager = $this->container->get(DoctrineManager::class);
   
       $this ->viewManager->renderTemplate("404.view.html",['user'=>$this->email]);
      
        


    }}
   