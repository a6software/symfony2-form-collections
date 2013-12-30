<?php

namespace MCM\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function arrayChoicesAction()
    {


        return $this->render('MCMDemoBundle:Default:index.html.twig');

//        return $this->render('MCMDemoBundle:Default:index.html.twig', array(
//            'name' => $name
//        ));
    }
}
