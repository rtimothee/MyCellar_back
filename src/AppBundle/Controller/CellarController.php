<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Service\CustomResponse;



class CellarController extends Controller
{

    /**
    * @Get("/cellar")
    **/
    public function getCellarAction(Request $request)
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $jsonResp = $this->get(CustomResponse::class);

        if (!$user) {
            return $jsonResp->getErrorResponse(Response::HTTP_NOT_FOUND, "User not found");
        }
   
        //TODO : Charger le cellar associé au user en BDD
        $em = $this->getDoctrine()->getManager();
        $listCellar = $em->getRepository('AppBundle:Cellar')->findBy(['user' => $user]);

        $user_formatted = $user->export();
        return $jsonResp->getResponse($user_formatted);
    }
}
