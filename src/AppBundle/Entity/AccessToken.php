<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;


/**
 * AccessToken
 *
 * @ORM\Table(name="oauth2_access_tokens")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AccessTokenRepository")
 */
class AccessToken extends BaseAccessToken
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    protected $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

