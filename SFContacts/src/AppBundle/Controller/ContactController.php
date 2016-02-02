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
     * @Route("/contacts/{id}", requirements= {"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Contact');
        
        $contact = $repo->find($id);
        
        if (!$contact) {
            throw $this->createNotFoundException();
        }
        
        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

    /**
     * @Route("/contacts/ajouter")
     */
    public function addAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $form = $this->createForm('AppBundle\Form\ContactType');
        // avec la complétion : 
        // $form = $this->createForm(\AppBundle\Form\ContactType::class)
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $data = $form->getData();
            
            $em = $this->getDoctrine()->getEntityManager();
            
            $em->persist($data);
            $em->flush();
            
            $this->addFlash('success', 'Le contact ' . $data->getPrenom() . ' a bien été ajouté');
            
            return $this->redirectToRoute('app_contact_list');
        }
        
        return $this->render('AppBundle:Contact:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
