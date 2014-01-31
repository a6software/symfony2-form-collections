<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="conference")
 */
class Conference
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Speaker", mappedBy="conference", cascade={"persist"})
     */
    protected $speakers;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;


    public function __construct()
    {
        $this->speakers = new ArrayCollection();
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
     * @param Collection $speakers
     * @return $this
     */
    public function setSpeakers(Collection $speakers)
    {
        $this->speakers = $speakers;

        return $this;
    }

    public function addSpeaker(Speaker $speaker)
    {
        if ( ! $this->speakers->contains($speaker) ) {
            $speaker->setConference($this);
            $this->speakers->add($speaker);
        }

        return $this->speakers;
    }

    public function removeSpeaker(Speaker $speaker)
    {
        if ($this->speakers->contains($speaker)) {
            $this->speakers->removeElement($speaker);
        }

        return $this->speakers;
    }

    /**
     * @return mixed
     */
    public function getSpeakers()
    {
        return $this->speakers;
    }



}