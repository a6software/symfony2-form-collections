<?php

namespace MCM\DemoBundle\Controller;

use MCM\DemoBundle\Entity\Colour;
use MCM\DemoBundle\Entity\MyChoice;
use MCM\DemoBundle\Form\Type\EntityChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function entityChoicesAction(Request $request)
    {
        $myChoice = new MyChoice();
        $favColour = $this->getDoctrine()->getRepository('MCMDemoBundle:Colour')->find(4);
        $myChoice->setFavColour($favColour);

        $form = $this->createForm(new EntityChoiceType(), $myChoice, array(
            'action' => $this->generateUrl('mcm_demo_entity_choice_form'),
            'method' => 'POST',
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            exit(\Doctrine\Common\Util\Debug::dump($myChoice));
        }

        return $this->render('MCMDemoBundle:Default:entityChoice.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
