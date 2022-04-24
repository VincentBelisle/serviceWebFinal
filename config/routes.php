<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Middleware\BasicAuthMiddleware;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    // Création d'un usager
    $app->post('/users', \App\Action\UserCreateAction::class);

    // Get la liste de tout les véhicules
	$app->get('/vehicles', \App\Action\VehiclesListAction::class);

	// Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class);

};

