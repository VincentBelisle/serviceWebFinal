<?php

namespace App\Action;

use App\Domain\User\Service\VehicleModifyById;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VehicleModifyActionId
{
	private $vehicleModifyId;

	public function __construct(VehicleModifyById $vehicleModifyId)
	{
		$this->vehicleModifyId = $vehicleModifyId;
	}


	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		// Collect input from the HTTP request

        $data = (array)$request->getParsedBody();

		$id = $request->getAttribute('id', 0);

		
		$result = $this->vehicleModifyId->modifyVehicleById($id,$data);

        if ($result == true){

            $result = [
                'message' => 'Vehicle modifié avec succès',
                'vehicle_id' => $id
            ];

            // build the HTTP response
            $response->getBody()->write((string)json_encode($result));

            return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
        }
        else 
        {

        $result = [
            'vehicle_id' => $id
        ];

        // build the HTTP response
        $response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}

}


