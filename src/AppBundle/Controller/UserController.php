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
use AppBundle\Entity\User;



class UserController extends Controller
{

    /**
    * @Post("/user")
    **/
    public function postUserAction(Request $request){

        $userManager = $this->get('fos_user.user_manager');

        $username   = $request->request->get('username');
        $email      = $request->request->get('email');
        $password   = $request->request->get('password');

        $jsonResp = $this->get(CustomResponse::class);

        // Test if User already exist
        if (!$username || !$email || !$password) {
            return $jsonResp->getErrorResponse(Response::HTTP_BAD_REQUEST, "Invalid params");
        } else if ($userManager->findUserByEmail($email) || $userManager->findUserByUsername($username)) {
            return $jsonResp->getErrorResponse(Response::HTTP_BAD_REQUEST, "User already exist");
        }

        // Create new user Entity
        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPlainPassword($password);
        $userManager->updateUser($user, true);

        $user_formatted = $user->export();
        return $jsonResp->getResponse($user_formatted);
    }


    /**
    * @Get("/user/current")
    **/
    public function getUserCurrentAction(Request $request){

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $jsonResp = $this->get(CustomResponse::class);

        if (!$user) {
            return $jsonResp->getErrorResponse(Response::HTTP_NOT_FOUND, "User not found");
        }

        $user_formatted = $user->export();
        return $jsonResp->getResponse($user_formatted);
    }


    /**
    * @Get("/user/{id}")
    **/
    public function getUserAction($id, Request $request){

        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserById($id);
        $jsonResp = $this->get(CustomResponse::class);

        if (!$user) {
            return $jsonResp->getErrorResponse(Response::HTTP_NOT_FOUND, "User not found");
        }

        return $jsonResp->getResponse($user);
    }


    /**
    * @GET("/client")
    **/
    public function addClientAction(){
        // $clientManager = $this->get('fos_oauth_server.client_manager.default');
        // $client = $clientManager->createClient();
        // $client->setAllowedGrantTypes(array('password'));
        // $clientManager->updateClient($client);

        // $data = array("hello" => "world");
        // $view = $this->view($data);
        // return $this->handleView($view);
    }
}
