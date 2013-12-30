<?php

namespace MCM\DemoBundle\Controller;

use MCM\DemoBundle\Form\Type\ArrayChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    private $differentColours = array(
        0 => 'orange',
        1 => 'violet',
        2 => 'crimson',
        3 => 'magenta',
        4 => 'indigo',
    );

    public function arrayChoicesAction(Request $request)
    {
        $form = $this->createForm(new ArrayChoiceType(), null, array(
            'action' => $this->generateUrl('mcm_demo_array_choice_form'),
            'method' => 'POST',
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            exit('aaaa');
        }

        return $this->render('MCMDemoBundle:Default:arrayChoice.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
