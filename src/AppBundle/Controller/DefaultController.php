<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Book;
use AppBundle\Entity\Dvd;
use AppBundle\Entity\Bluray;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository('AppBundle:Book')->findBy(array(), array('id' => 'DESC'),5);
        $dvds = $em->getRepository('AppBundle:Dvd')->findBy(array(), array('id' => 'DESC'),5);
        $blurays = $em->getRepository('AppBundle:Bluray')->findBy(array(), array('id' => 'DESC'),5);
        
        // replace this example code with whatever you need
        return $this->render('default/front/index.html.twig', [
                    'books' => $books,
                    'dvds' => $dvds,
                    'blurays' => $blurays
        ]);
    }
    
    /**
     * @Route("/book/{id}", name="detail_book")
     */
    public function detailBookAction(Book $book)
    {
        
        return $this->render('default/front/detail_book.html.twig', array(
            'book'        => $book
        ));
    }
    
    /**
     * @Route("/dvd/{id}", name="detail_dvd")
     */
    public function detailDvdAction(Dvd $dvd)
    {
        
        return $this->render('default/front/detail_dvd.html.twig', array(
            'dvd'        => $dvd
        ));
    }
    
    /**
     * @Route("/bluray/{id}", name="detail_bluray")
     */
    public function detailBlurayAction(Bluray $bluray)
    {
        
        return $this->render('default/front/detail_bluray.html.twig', array(
            'bluray'        => $bluray
        ));
    }
    
    /**
     * @Route("/search/", name="search_form")
     */
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $motCles = $request->request->get('motCles');
        $arrayMotCles = explode(' ', $motCles);
        
        $books = $em->getRepository('AppBundle:Book')->getbySearch($arrayMotCles);
        $dvds = $em->getRepository('AppBundle:Dvd')->getbySearch($arrayMotCles);
        $blurays = $em->getRepository('AppBundle:Bluray')->getbySearch($arrayMotCles);
        
        return $this->render('default/front/index.html.twig', [
                    'books' => $books,
                    'dvds' => $dvds,
                    'blurays' => $blurays
        ]);
    }
    
}
