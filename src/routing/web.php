<?php
namespace App\routing;
use FastRoute\Dispatcher;

 class web
 {
     public static function getDispatcher(): Dispatcher
     {
        return \FastRoute\simpleDispatcher(
            function (\FastRoute\RouteCollector $route){
                $route->addRoute('GET','/s',['App\controllers\HomeController',"index"]);
                $route->addRoute('GET','/w',['App\controllers\WhoController',"index"]);
                $route->addRoute('GET','/increase',['App\controllers\HomeController',"sumatorio"]);
            }

        );
     }
 }