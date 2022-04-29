<?php

namespace App\Action;

use App\Domain\User\Service\VehicleList;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VehicleListAction
{
	private $vehicleList;

	public function __construct(VehicleList $vehicleList)
	{
		$this->vehicleList = $vehicleList;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {


		// Transform the result into the JSON representation
		$result = $this->vehicleList->selectVehicles();

		if (sizeof($result) == 0) {
			$response->getBody()->write((string)json_encode(['message' => 'No vehicles found']));


			return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(404);
		} else {
			$response->getBody()->write((string)json_encode($result));
		
		// Build the HTTP response
		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
		}
	}
}
