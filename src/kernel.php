<?php
namespace App;
use App\routing\web;
use Kint;
class kernel
{
   public function __construct()
   {
       $logManager = new LogManager();
       $logManager -> info("Arrancando la aplicación");
       $httpMethod = $_SERVER['REQUEST_METHOD'];
       $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $web = new Web();
        $routerManager = new RouterManager();
        $routerManager->dispatch($httpMethod, $uri,$web::getDispatcher());

   }

}