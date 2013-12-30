<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="colour")
 * @ORM\HasLifecycleCallbacks()
 */
class Colour
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $favColour;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $favColour
     * @return $this
     */
    public function setFavColour($favColour)
    {
        $this->favColour = $favColour;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFavColour()
    {
        return $this->favColour;
    }
    
}