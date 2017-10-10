<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
//use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Get;



class UserController extends Controller
{

    /**
    * @Get("/users")
    **/
    public function getUsersAction()
    {
        $data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
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