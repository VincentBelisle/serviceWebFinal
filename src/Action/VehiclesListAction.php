<?php

namespace App\Action;

use App\Domain\User\Service\UserCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VehiclesListAction
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


		// Invoke the Domain with inputs and retain the result
		//$userId = $this->userCreator->createUser($data);

		// Transform the result into the JSON representation
		$result = [
			'user_id' => $userId
		];

		// Build the HTTP response
		$response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}
