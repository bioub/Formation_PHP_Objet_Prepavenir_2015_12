<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SocieteController extends Controller
{
    /**
     * @Route("/societes")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Societe:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/societes/{id}", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        return $this->render('AppBundle:Societe:show.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/societes/ajouter")
     */
    public function addAction()
    {
        return $this->render('AppBundle:Societe:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/societes/{id}/supprimer")
     */
    public function removeAction($id)
    {
        return $this->render('AppBundle:Societe:remove.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/societes/{id}/modifier")
     */
    public function updateAction($id)
    {
        return $this->render('AppBundle:Societe:update.html.twig', array(
            // ...
        ));
    }

}
