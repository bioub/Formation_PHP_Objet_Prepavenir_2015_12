<?php

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
    
    if (!$voiture) {
        // Erreur 404
        throw new \Slim\Exception\NotFoundException($request, $response);
    }

    // 3 - Afficher les données dans la Vue (HTML)
    return $this->renderer->render($response, 'details.phtml', [
        'voiture' => $voiture
    ]);
});

