<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// pdo
$container['pdo'] = function ($c) {
    $settings = $c->get('settings')['mysql'];
    
    $dsn = "mysql:host=$settings[serveur];dbname=$settings[base];charset=$settings[charset]";
    $username = $settings['user'];
    $password = $settings['pass'];
    
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $pdo;
};

// voitureMapper
$container['voitureMapper'] = function ($c) {
    $pdo = $c['pdo'];
    return new Prepavenir\Mapper\VoitureMapper($pdo);
};