<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="football_team")
 */
class FootballTeam
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Person", mappedBy="favFootballTeam")
     */
    protected $fans;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100, name="stadium_name")
     */
    protected $stadiumName;


    public function __construct()
    {
        $this->fans = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $stadiumName
     */
    public function setStadiumName($stadiumName)
    {
        $this->stadiumName = $stadiumName;
    }

    /**
     * @return mixed
     */
    public function getStadiumName()
    {
        return $this->stadiumName;
    }

    /**
     * @param mixed $fans
     */
    public function setFans($fans)
    {
        $this->fans = $fans;
    }

    /**
     * @return mixed
     */
    public function getFans()
    {
        return $this->fans;
    }



}