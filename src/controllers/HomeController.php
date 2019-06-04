<?php
namespace App\controllers;
use App\ViewManager;
use DI\Container;
class HomeController{
    private $container;
    public function __construct(Container $container){
        $this->container = $container;
    }
    public function index(){
       // $viewManager = $this->container->get(ViewManager::class);
        $viewManager = new ViewManager();
        $viewManager->renderTemplate("index.view.html");

    }
    public function indexer(){
       echo "SEGUNDO METODO";

    }
}