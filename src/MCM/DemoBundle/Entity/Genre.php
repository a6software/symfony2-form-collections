<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="genre")
 */
class Genre
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Dj", mappedBy="genre")
     */
    protected $djs;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;


    public function __construct()
    {
        $this->djs = new ArrayCollection();
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
     * @param Collection $djs
     * @return $this
     */
    public function setDjs(Collection $djs)
    {
        $this->djs = $djs;

        return $this;
    }

    public function addDj(Dj $dj)
    {
        if ( ! $this->djs->contains($dj) ) {
            $this->djs->add($dj);
        }

        return $this->djs;
    }

    /**
     * @return mixed
     */
    public function getDjs()
    {
        return $this->djs;
    }



}