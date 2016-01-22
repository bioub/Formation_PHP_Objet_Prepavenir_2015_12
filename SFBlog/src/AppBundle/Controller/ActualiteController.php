<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ActualiteController extends Controller
{
    /**
     * @Route("/actualites")
     */
    public function listAction()
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Actualite');
        
        $dernieresActus = $repo->findBy([], ['datePub' => 'DESC'], 10);
        
        return $this->render('AppBundle:Actualite:list.html.twig', array(
            'actualites' => $dernieresActus
        ));
    }

    /**
     * @Route("/actualites/{id}")
     */
    public function showAction(\AppBundle\Entity\Actualite $actu)
    {
        return $this->render('AppBundle:Actualite:show.html.twig', array(
            'actu' => $actu
        ));
    }

}
