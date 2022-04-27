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

		// Build the HTTP response
		$response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
	}
}
