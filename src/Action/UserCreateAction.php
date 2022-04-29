<?php

namespace App\Action;

use App\Domain\User\Service\UserCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UserCreateAction
{
    private $userCreator;

    public function __construct(UserCreator $userCreator)
    {
        $this->userCreator = $userCreator;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $api_key = $this->userCreator->createUser($data);

    
        if ($api_key == "") {

            $response->getBody()->write((string)json_encode(['error' => 'User already exists, choose another username']));


        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
        }
        else
        {
           

        // Transform the result into the JSON representation
        $result = [
            'api_key' => $api_key
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
       } 
    }
       
}

