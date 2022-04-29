<?php

use App\Middleware\ApiMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {

    // Permet a un usager d'obtenir une clé d'api

    $app->get('/cle_api', \App\Action\CleApiAction::class);

    // Création d'un usager
    $app->post('/users', \App\Action\UserCreateAction::class);


	// Création d'un véhicule
	$app->post('/vehicles', \App\Action\VehicleCreateAction::class);


    // Suppression d'un véhicule selon son id
	$app->delete('/vehicles/{id}', \App\Action\VehicleDeleteActionId::class);
        

     // Modification d'un véhicule selon son id
	$app->put('/vehicles/{id}', \App\Action\VehicleModifyActionId::class);


    // Get la liste de tout les véhicules
	$app->get('/vehicles', \App\Action\VehicleListAction::class);
        
        

	// Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class);

};

