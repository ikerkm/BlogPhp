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
                $route->addRoute('GET', '/register',["App\controllers\auth\RegisterController",'index']);
                $route->addRoute('POST', '/register',["App\controllers\auth\RegisterController",'register']);
                $route->addRoute('GET', '/login',["App\controllers\auth\LoginController",'index']);
                $route->addRoute('POST', '/login',["App\controllers\auth\LoginController",'login']);
                $route->addRoute('GET', '/dashboard',["App\controllers\DashBoardController",'index']);
                $route->addRoute('GET','/logout',["App\controllers\auth\LogoutController",'index']);
                $route->addRoute('GET','/create-post',["App\controllers\PostFormController",'index']);
                $route->addRoute('POST','/create-post',["App\controllers\PostFormController",'create_post']);
                $route->addRoute('GET','/delete/{id}',["App\controllers\PostFormController",'delete']);
                $route->addRoute('GET','/edit/{id}',["App\controllers\PostFormController",'edit']);
                $route->addRoute('POST','/edit/{id}',["App\controllers\PostFormController",'update']);
            }

        );
     }
 }