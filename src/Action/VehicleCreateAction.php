<?php

namespace App\Action;

use App\Domain\User\Service\VehicleCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VehicleCreateAction
{
	private $vehicleCreator;

	public function __construct(vehicleCreator $vehicleCreator)
	{
		$this->vehicleCreator = $vehicleCreator;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		// Collect input from the HTTP request
		$data = (array)$request->getParsedBody();

		// Invoke the Domain with inputs and retain the result
		$vehicleId = $this->vehicleCreator->createVehicle($data);

		// Transform the result into the JSON representation
		$result = [
			'vehicle_id' => $vehicleId
		];

		// Build the HTTP response
		$response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}

