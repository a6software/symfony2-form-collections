<?php

namespace MCM\DemoBundle\Controller;

use MCM\DemoBundle\Entity\Dj;
use MCM\DemoBundle\Entity\Genre;
use MCM\DemoBundle\Form\Type\GenreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Collection;

class DefaultController extends Controller
{
    public function collectionsAction(Request $request)
    {
        $genre = new Genre();
        $genre->setName('trance');

        $dj1 = new Dj();
        $dj1->setName('Armin Van Buuren');
        $genre->getDjs()->add($dj1);

        $dj2 = new Dj();
        $dj2->setName('Paul Van Dyk');
        $genre->getDjs()->add($dj2);


        $form = $this->createForm(new GenreType(), $genre, array(
            'action' => $this->generateUrl('mcm_demo_collection_form'),
            'method' => 'POST',
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            exit(\Doctrine\Common\Util\Debug::dump($genre));
        }

        return $this->render('MCMDemoBundle:Default:genre.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
