<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;

class CustomResponse {

	public function __construct() {}

	public function getResponse($datas){
		$response = new JsonResponse();
		$serializer = SerializerBuilder::create()->build();
		$response->setJson($serializer->serialize($datas, 'json'));
		return $response;
	}

	public function getErrorResponse($http_code, $description){
		$response = new JsonResponse();
    $response->setStatusCode($http_code);
    $response->setData([
        "error" => Response::$statusTexts[$http_code],
        "error_description" => $description
    ]);
    return $response;
	}
}
