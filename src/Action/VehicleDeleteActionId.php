<?php

namespace App\Action;

use App\Domain\User\Service\VehicleDeleteById;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VehicleDeleteActionId
{
	private $vehicleDeleteId;

	public function __construct(VehicleDeleteById $vehicleDeleteId)
	{
		$this->vehicleDeleteId = $vehicleDeleteId;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		// Collect input from the HTTP request

		$id = $request->getAttribute('id', 0);

		
		$this->vehicleDeleteId->deleteVehicleById($id);


		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(204);
	}
}


