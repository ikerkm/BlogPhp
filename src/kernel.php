<?php
namespace App;

class kernel
{
   public function __construct()
   {
       $logManager = new LogManager();
       $logManager -> info("Arrancando la aplicación");
       $ViewManager =new ViewManager();
       $ViewManager->renderTemplate("index.view.html");
   }

}