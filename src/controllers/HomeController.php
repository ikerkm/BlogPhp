<?php
namespace App\controllers;
use App\DoctrineManager;
use App\models\entities\Post;
use App\services\PostsService;
use Kint;
class HomeController extends ControllerAuth{
   
    public function index(){
     // $doctrineManager = $this->container->get(DoctrineManager::class);
     $PostsService = $this->container->get(PostsService::class);
    $posts =  $PostsService->getPosts();
     

      $big_array = [];
      for ($i=0;$i<sizeof($posts);$i++){
        $tiny_array =[];
     
      array_push($tiny_array,$posts[$i]->id,$posts[$i]->tittle,$posts[$i]->body, $posts[$i]->id_user,$posts[$i]->created_at );
        array_push($big_array,$tiny_array);
      }
    
       $this ->viewManager->renderTemplate("index.view.html",['posts'=>$big_array,'user'=>$this->email]);
      
        


    }
    public function sumatorio(Request $req){
        
        echo $req;
        var_dump($this->sumatorio-> sumar(4));

    }
    
}