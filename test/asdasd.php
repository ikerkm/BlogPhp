<?php
namespace App;
use App\routing\web;
use \DI\ContainerBuilder;
use \DI\Container;
class kernel
{
    private $container;
    private $logger;
    private $doctrine;
    public function __construct(){
        
       $this->container = $this->createContainer();
       $this->logger = $this->container->get(LogManager::class);
       $this->doctrine = $this->container->get(DoctrineManager::class);
    }
    public function init()
    {
        
        $this->logger->info("Arrancando la aplicación");
        $httpMethod= $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        
     //   $route->dispatch($httpMethod, $uri, web::getDispatcher());




     dispatch($httpMethod, $uri, getDispatcher());
    }
    public function createContainer():Container
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->useAutowiring(true);
        return $containerBuilder->build();
    }
   
    public function dispatch(string $requestMethod, string $requestUri, \FastRoute\Dispatcher $dispatcher )
    {
            $route = $dispatcher->dispatch($requestMethod, $requestUri);
            switch($route[0]){
                case \FastRoute\Dispatcher::NOT_FOUND:
                   header("HTTP/1.0 404 Not Found");
                   echo "<h1>NOT FOUND </h1>";
                break;
                case \FastRoute\Dispatcher::FOUND:
                   $controller = $route[1];
                   $method = $route[2];
                   $this->container->call($controller, $method);
                break;
                case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                   header("HTTP/1.0 405 Method not Allowed");
                   echo "<h1> METHOD NO ALLOWED </h1>";
                break;
            }
    }


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