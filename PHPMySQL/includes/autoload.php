<?php

spl_autoload_register(function ($nomClasse) {
    $cheminClasse = __DIR__ . "/../classes/$nomClasse.php";
    $cheminClasse = strtr($cheminClasse, '/\\', DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR);
    
    require_once $cheminClasse;
});