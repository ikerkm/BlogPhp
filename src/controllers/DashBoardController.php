<?php

namespace App\controllers;
use App\services\UsersService;
use App\services\PostsService;
use Kint;
class DashBoardController extends ControllerAuth {


public function index(){
    if (!$this->user->id)$this->redirectTo('login');
    $PostsService = $this->container->get(PostsService::class);
   
    
 
    $posts = $PostsService->getPostsById($this->user->id);
    
    $big_array = [];
     for ($i=0;$i<sizeof($posts);$i++){
       $tiny_array =[];

     array_push($tiny_array,$posts[$i]->id,$posts[$i]->tittle,$posts[$i]->body, $posts[$i]->idUser,$posts[$i]->created_at );
       array_push($big_array,$tiny_array);
  
     }
     
    $this->viewManager->renderTemplate('dashboard.view.html',['user'=>$this->email,'posts'=>$big_array]);

}




}