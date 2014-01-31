<?php

namespace MCM\DemoBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
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
        $em = $this->getDoctrine()->getManager();

        $conference = $em->getRepository('MCMDemoBundle:Conference')->find(1); /** @var $conference Conference */

        $form = $this->createForm(new ConferenceType(), $conference, array(
            'action' => $this->generateUrl('mcm_demo_collection_form'),
            'method' => 'POST',
        ));

        $originalSpeakers = new ArrayCollection();

        foreach ($conference->getSpeakers() as $speaker) {
            $originalSpeakers->add($speaker);
        }

        $form->handleRequest($request);

        if ($form->isValid()) {

            foreach ($originalSpeakers as $originalSpeaker) { /** @var $originalSpeaker Speaker */
                if ($conference->getSpeakers()->contains($originalSpeaker) === false) {
                    $conference->removeSpeaker($originalSpeaker);
                    $originalSpeaker->setConference(null);
                    $em->remove($originalSpeaker);
//                    $em->persist($originalSpeaker);
                }
            }

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
