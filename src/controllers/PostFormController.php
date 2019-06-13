<?php
namespace App\controllers;
use App\Services\UsersService;
use App\Services\PostsService;
use App\DoctrineManager;
use App\models\entities\Post;
use Kint;
class PostFormController extends ControllerAuth{

public function index(){
    if (!$this->user->id)$this->redirectTo('login');
$this->viewManager->renderTemplate('form-post.view.html',['user'=>$this->email]);


}

public function create_post(DoctrineManager $doctrine){
$title = $_POST['tittle'];
$body = $_POST['body'];
$idUser = $this->user->id;
$post = new Post();
$post->tittle = $title;
$post->body = $body;
$post->idUser = $idUser;
$doctrine->em->persist($post);
$doctrine->em->flush();
$this->redirectTo('dashboard');


}


public function delete($id){
    $postService = $this->container->get(PostsService::class);
    try{
    $postService->deletePostUserById($this->user->id, $id);
    $this->redirectTo('dashboard');    
    } catch(\Exception $e) 
    {
        $this->logger->error($e->getMessage());
        $this->redirectTo('dashboard');
    }
    
}
public function edit($id){
    $postService =$this->container->get(PostsService::class);
    try{
     $post = $postService-> getPostUserById($this->user->id, $id);
    $this->viewManager->renderTemplate('edit-post.view.html',['post'=>$post,'user'=>$this->email]);
    } catch( \Exception $e)
    {
        $this->logger->error($e->getMessage());
    }
}
public function update($id){
    $postService =$this->container->get(PostsService::class);
    try{
     $post = $postService-> getPostUserById($this->user->id, $id);
 
     $title = $_POST['title'];
     $body= $_POST['body'];
     $post->title = $title;
     $post->body= $body;
    $postService->pullPostUserById($this->user->id, $post);
    $this->redirectTo('dashboard');
    }catch (\Exception $e){
        $this->logger->error($e->getMessage());
    }
}


}