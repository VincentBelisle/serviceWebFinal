<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Middleware\BasicAuthMiddleware;
use Slim\App;

return function (App $app) {

    // Création d'un usager
    $app->post('/users', \App\Action\VehicleCreateAction::class);

	// Création d'un véhicule
	$app->post('/vehicle', \App\Action\VehicleCreateAction::class);

    // Suppression d'un véhicule
	$app->delete('/vehicle/{id}', \App\Action\VehicleDeleteActionId::class);

    // Get la liste de tout les véhicules
	$app->get('/vehicles', \App\Action\VehicleListAction::class);

	// Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class);

};

