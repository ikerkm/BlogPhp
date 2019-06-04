<?php
namespace App\routing;
use FastRoute\Dispatcher;

 class web
 {
     public static function getDispatcher(): Dispatcher
     {
        return \FastRoute\simpleDispatcher(
            function (\FastRoute\RouteCollector $route){
                $route->addRoute('GET','/s',['App\controllers\HomeController',"indexer"]);
                $route->addRoute('GET','/w',['App\controllers\WhoController',"showview"]);
            }

        );
     }
 }