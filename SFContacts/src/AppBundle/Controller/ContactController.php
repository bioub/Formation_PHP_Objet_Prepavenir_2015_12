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
        $repo = $this->getDoctrine()->getRepository('AppBundle:Contact');
        
        $contacts = $repo->findAll();
        
        return $this->render('AppBundle:Contact:list.html.twig', array(
            'contacts' => $contacts
        ));
    }

    /**
     * @Route("/contacts/{id}")
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Contact');
        
        $contact = $repo->find($id);
        
        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

}
