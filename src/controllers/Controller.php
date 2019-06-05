<?php
namespace App\controllers;
use App\ViewManager;
use App\LogManager;
use App\Sumador;
use DI\Container;
abstract class Controller{
    protected $container;
    protected $viewManager;
    protected $logger;
    protected $sumatorio;
    public function __construct(Container $container){
        $this->container = $container;
        $this->viewManager = $this->container->get(ViewManager::class);
        $this->logger = $this->container->get(LogManager::class);
        $this->logger->info("Clase ".get_class($this)." cargada");
        $this->sumatorio = $this->container->get(Sumador::class);
    }
    public abstract function index();
    
   
}