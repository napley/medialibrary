<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository('AppBundle:Book')->findBy(array(), array('publishedDate' => 'DESC'),5);
        $dvds = $em->getRepository('AppBundle:Dvd')->findBy(array(), array('releaseDate' => 'DESC'),5);
        $blurays = $em->getRepository('AppBundle:Bluray')->findBy(array(), array('releaseDate' => 'DESC'),5);
        
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
                    'books' => $books,
                    'dvds' => $dvds,
                    'blurays' => $blurays
        ]);
    }
}
