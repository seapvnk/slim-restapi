<?php

declare(strict_types=1);

namespace App\Application\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class HelloController extends BaseController
{

    public function index(Request $request, Response $response)
    {
        $params = (array)$request->getParsedBody();
        $subject = isset($params['subject']) ? $params['subject'] : "World";

        $response->getBody()->write(json_encode([
            "message" => "Hello, $subject!",
        ]));

        return $response
            ->withStatus(200)
            ->withHeader('Content-type', 'application/json');
    }

    public function random(Request $request, Response $response)
    {
        $params = (array)$request->getParsedBody();
        
        $min = (int) isset($params['min']) ? $params['min'] : 0;
        $max = (int) isset($params['max']) ? $params['max'] : 10;

        $random = rand($min, $max);

        $response->getBody()->write(json_encode([
            "number" => $random,
            "min" => $min,
            "max" => $max,
        ]));

        return $response
            ->withStatus(200)
            ->withHeader('Content-type', 'application/json');
    }

}
