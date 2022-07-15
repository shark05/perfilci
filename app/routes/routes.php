<?php

use Slim\App;
use app\controllers\HomeController;

/**  Rotas Site **/

return function (App $app){
    //$app->get('/', [HomeController::class, 'index']);
    // Example route
    $app->get('/', function ($request, $response, $args) {
        return $this->get('view')->render($response, 'home.twig', [
        'name' => $args['name']
        ]);
    });

    $app->get('/contato', function ($request, $response, $args) {
        return $this->get('view')->render($response, 'contato.twig', [
        'name' => $args['name']
        ]);
    });
};