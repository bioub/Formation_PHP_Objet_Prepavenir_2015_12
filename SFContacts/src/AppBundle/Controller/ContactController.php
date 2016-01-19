<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContactController extends Controller
{
    /**
     * @Route("/contacts")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Contact:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/contacts/{id}")
     */
    public function showAction($id)
    {
        return $this->render('AppBundle:Contact:show.html.twig', array(
            // ...
        ));
    }

}
