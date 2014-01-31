<?php

namespace MCM\DemoBundle\Controller;

use MCM\DemoBundle\Entity\Conference;
use MCM\DemoBundle\Entity\Speaker;
use MCM\DemoBundle\Form\Type\ConferenceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Collection;

class DefaultController extends Controller
{
    public function collectionsAction(Request $request)
    {
        $conference = new Conference();
//        $conference->setName('International Pie Conference');
//
//        $speaker1 = new Speaker();
//        $speaker1->setName('Mr M. Potato');
//        $conference->getSpeakers()->add($speaker1);
//
//        $speaker2 = new Speaker();
//        $speaker2->setName('Mr C. Onion');
//        $conference->getSpeakers()->add($speaker2);


        $form = $this->createForm(new ConferenceType(), $conference, array(
            'action' => $this->generateUrl('mcm_demo_collection_form'),
            'method' => 'POST',
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conference);
            $em->flush();

            return $this->redirect($this->generateUrl('mcm_demo_collection_form'));
//            exit(\Doctrine\Common\Util\Debug::dump($conference));
        }

        return $this->render('MCMDemoBundle:Default:conference.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
