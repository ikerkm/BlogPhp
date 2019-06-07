<?php

namespace App\controllers;


class DashBoardController extends Controller {


public function index(){
    $user = $this->sessionManager->get('user');
    if(!$user) return $this->redirectTo('login');
    $this->viewManager->renderTemplate('dashboard.view.html',['user'=>$user]);

}




}