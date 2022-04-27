<?php


namespace App\Middleware;



use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class AuthMiddleware {


	public function __invoke(
		Request $request,
		RequestHandler $handler
	): ResponseInterface {
// Extraction du token encodé de l'entête
		$token = explode( ' ', $request->getHeaderLine( 'Authorization' ) )[1] ?? '';

		if ( ! $this->basicAuthValidation->isTokenValid( $token ) ) {
// Si le token n'est pas valide, on retourne une réponse vide avec le code
// de statut 401
			return $this->responseFactory->createResponse()
			                             ->withStatus( 401, 'Unauthorized' );
		}

// Sinon on retourne la réponse originale
		return $handler->handle( $request );
	}

}