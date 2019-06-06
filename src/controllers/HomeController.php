<?php
namespace App\controllers;
use App\DoctrineManager;
use App\models\entities\User;
use Kint;
class HomeController extends Controller{
   
    public function index(){
   

       $this ->viewManager->renderTemplate("index.view.html");
        
        

    }
    public function sumatorio(Request $req){
        
        echo $req;
        var_dump($this->sumatorio-> sumar(4));

    }
    
}