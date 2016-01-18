<?php
return [
    'settings' => [
        'displayErrorDetails' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
        
        'mysql' => [
            'serveur' => 'localhost',
            'base' => 'prepavenir_annonces_auto',
            'charset' => 'UTF8',
            'user' => 'root',
            'pass' => ''
        ]
    ],
];
