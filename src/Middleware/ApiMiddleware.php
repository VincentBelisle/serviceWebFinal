
<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class ApiMiddleware
{
    /**
     * Example middleware invokable class
     *
     * @param  ServerRequest  $request PSR-7 request
     * @param  RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {

        $api_key = $request->getHeaderLine('x-api-key') ?? '';


        $sql_verification = "SELECT EXISTS(SELECT 1 FROM users WHERE api_key = '$api_key'";

        $tab = $this->connection->prepare($sql_verification);

        $tab->execute();

        $tableau = $tab->fetchAll();


        if ($tableau[0]['exist'] == 0) {

            $response = new Response();
            $response->getBody()->write('You are not allowed to access this resource');
            return $response->withStatus(401);
        }
        else 
        {
            return $handler->handle($request);
        }

      
    }
}


