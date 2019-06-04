<?php
namespace App\controllers;
use App\ViewManager;
class WhoController{
    public function showview(){
        $viewManager = new ViewManager();
        $viewManager->renderTemplate("WhoWeAre.view.html");

    }

}