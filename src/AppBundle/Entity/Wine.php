<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Cellar;

/**
 * Wine
 *
 * @ORM\Table(name="wine")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WineRepository")
 */
class Wine
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255)
     */
    private $region;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="domain", type="string", length=255, nullable=true)
     */
    private $domain;

    /**
     * @var string
     *
     * @ORM\Column(name="appelation", type="string", length=255, nullable=true)
     */
    private $appelation;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=true)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="cepage", type="string", length=255, nullable=true)
     */
    private $cepage;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cellar")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cellar;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Wine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Wine
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Wine
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return Wine
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set appelation
     *
     * @param string $appelation
     *
     * @return Wine
     */
    public function setAppelation($appelation)
    {
        $this->appelation = $appelation;

        return $this;
    }

    /**
     * Get appelation
     *
     * @return string
     */
    public function getAppelation()
    {
        return $this->appelation;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Wine
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set cepage
     *
     * @param string $cepage
     *
     * @return Wine
     */
    public function setCepage($cepage)
    {
        $this->cepage = $cepage;

        return $this;
    }

    /**
     * Get cepage
     *
     * @return string
     */
    public function getCepage()
    {
        return $this->cepage;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Wine
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set Cellar
     *
     * @param Cellar $celar
     * 
     * @return Wine
     */
    public function setCellar (Cellar $cellar)
    {
        $this->cellar = $cellar;

        return $this;
    }

    /**
     * Get Cellar
     *
     * @return Cellar
     */
     public function getCellar ()
     {
        return $this->cellar;
     } 
}

