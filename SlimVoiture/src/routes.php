<?php

use Prepavenir\Mapper\VoitureMapper;
// Routes

$app->get('/', function ($request, $response) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    $result = $this->voitureMapper->findAll();

    // 3 - Afficher les données dans la Vue (HTML)
    return $this->renderer->render($response, 'index.phtml', [
        'result' => $result
    ]);
});

$app->get('/voiture/{id}', function ($request, $response) {
    $id = $request->getAttribute('id');
    
    $voiture = $this->voitureMapper->find($id);
    
    if ($voiture) {
        // TODO erreur 404
    }

    // 3 - Afficher les données dans la Vue (HTML)
    return $this->renderer->render($response, 'details.phtml', [
        'voiture' => $voiture
    ]);
});