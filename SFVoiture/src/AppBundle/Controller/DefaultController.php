<?php

namespace AppBundle\Controller;

use PDO;
use Prepavenir\Mapper\VoitureMapper;
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
        // 1 - Se connecter à la base de données
        $dsn = 'mysql:host=localhost;dbname=prepavenir_annonces_auto;charset=UTF8';
        $username = 'root';
        $password = '';
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 2 - Demande les données au Modèle (mapper)
        $mapper = new VoitureMapper($pdo);
        $result = $mapper->findAll();

        // 3 - Afficher les données dans la Vue (HTML)
        return $this->render('::default/index.html.php', [
            'result' => $result
        ]);
    }
    
    /**
     * @Route("/voiture/{id}", name="afficher")
     */
    public function afficherAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
