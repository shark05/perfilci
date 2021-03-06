<?php

$container = $app->getContainer();
//container twig view
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'../resources/views', [
        'cache' => __DIR__.'../cache'
    ]);
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    return $view;
};

