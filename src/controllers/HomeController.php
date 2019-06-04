<?php
namespace App\controllers;
use App\ViewManager;
class HomeController{
    public function index(){
        $viewManager = new ViewManager();
        $viewManager->renderTemplate("index.view.html");

    }
    public function indexer(){
       echo "SEGUNDO METODO";

    }
}