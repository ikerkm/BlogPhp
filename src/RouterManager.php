<?php
/*namespace App;
use App\src\controllers\HomeController;
use App\ViewManager;
use DI\Container;
class RouterManager{
    private $container;
    public function __contruct(Container $container){
        $this->container = $container;
    }
    public function dispatch(string $requestMethod, string $requestUri,\FastRoute\Dispatcher $dispatcher){
  
        $route = $dispatcher -> dispatch($requestMethod, $requestUri);
     
        switch($route[0]){
            case \FastRoute\Dispatcher::NOT_FOUND:
            header("HTTP/1.0 404 Not Found");
            $viewManager = new ViewManager();
        $viewManager->renderTemplate("notFound.view.html");
            break;
        case \FastRoute\Dispatcher::FOUND:
        $handler = $route[1];
        $vars = $route[2];
        if (is_callable($handler)){
            $this->container->displayData=$handler($vars);
          // $this->container->call($handler,$vars);
        }
        
        break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        header("HTTP/1.0 405 Not Found");
        echo "<h1>METHOD NOT ALLOWED</H1>";
        // ... 405 Method Not Allowed
        break;
        }
    }
}
*/
//CREAR VISTA CHULA 404 QUE SE LLAME DESDE VIEW MANAGER



namespace App;
use Kint;
use DI\Container;
class RouterManager
{
    private $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    public function dispatch(string $requestMethod, string $requestUri, \FastRoute\Dispatcher $dispatcher )
    {
            $route = $dispatcher->dispatch($requestMethod, $requestUri);

            var_dump($route);
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
}