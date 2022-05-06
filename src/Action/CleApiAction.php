<?php

namespace App\Action;

use App\Domain\User\Service\CleApi;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CleApiAction
{
	private $cleApi;

	public function __construct(cleApi $cleApi)
	{
		$this->cleApi = $cleApi;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		
        // Collect input from the HTTP request
		$data = (array)$request->getQueryParams();

		// Transform the result into the JSON representation
		$result = $this->cleApi->selectCleApi($data);

		if ($result == "") {
			$response->getBody()->write((string)json_encode(['message' => 'Username ou mot de passe incorrect']));


			return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(401);
		} else {
			$response->getBody()->write((string)json_encode($result));
		
		// Build the HTTP response
		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
		}
	}
}
