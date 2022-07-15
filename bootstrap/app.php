<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ .'/../vendor/autoload.php';

// Cria o Container
$container = new Container();
AppFactory::setContainer($container);

// Seta o View no Container
$container->set('view', function() {
    return Twig::create(__DIR__ . '/../app/resources/views',
        ['cache' => __DIR__ . './cache']);
});

// Cria o App
$app = AppFactory::create();

// Rotas do App
$rotas = require __DIR__ . '/../app/routes/routes.php';
$rotas($app);

// Adiciona Twig-View Middleware
$app->add(TwigMiddleware::createFromContainer($app));


// Executa o app
$app->run();