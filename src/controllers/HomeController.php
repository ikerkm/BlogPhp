<?php
namespace App\controllers;
use App\DoctrineManager;
use App\models\entities\Post;
use Kint;
class HomeController extends Controller{
   
    public function index(){
      $doctrineManager = $this->container->get(DoctrineManager::class);
      $repository = $doctrineManager->em->getRepository(Post::class);
     
      $posts=$repository->findAll();

      $big_array = [];
      for ($i=0;$i<sizeof($posts);$i++){
        $tiny_array =[];
     
      array_push($tiny_array,$posts[$i]->id,$posts[$i]->tittle,$posts[$i]->body, $posts[$i]->id_user,$posts[$i]->created_at );
        array_push($big_array,$tiny_array);
      }
      Kint::dump($big_array);
       $this ->viewManager->renderTemplate("index.view.html",['posts'=>$big_array]);
      
        

    }
    public function sumatorio(Request $req){
        
        echo $req;
        var_dump($this->sumatorio-> sumar(4));

    }
    
}