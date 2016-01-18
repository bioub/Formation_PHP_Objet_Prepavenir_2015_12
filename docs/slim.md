# Slim Framework

Micro-framework : adapté à des petites applications.

## Création du squelette d'application (du projet) :

    cd c:\xampp\htdocs
    composer create-project slim/slim-skeleton SlimVoiture
    
## Arborescence du squelette

	SlimVoiture/
	├── composer.json
	├── composer.lock
	├── logs
	├── public
	│   ├── .htaccess
	│   └── index.php
	├── src
	│   ├── dependencies.php
	│   ├── middleware.php
	│   ├── routes.php
	│   └── settings.php
	├── templates
	│   └── index.phtml
	└── vendor
	    ├── autoload.php
	    └── ...
	    
Répertoire public :
Racine de votre application, si votre site est http://www.monsite.com/ le / correspond au répertoire public

On créera ici les fichiers accessibles par le client : images, CSS, JS, PDF...

### public/index.php :
Point d'entrée unique de l'application (Front Controller)

`if (PHP_SAPI == 'cli-server') { ... }` : si on démarre le serveur en ligne de commande (sans Apache/XAMPP)

`require __DIR__ . '/../vendor/autoload.php';` : on utilise l'Autoloader de classe de Composer (parce que c'est composer qui sait où sont les classes) pour éviter les require de chaque classe

`session_start();` : on démarre la session utilisateur (pour accéder au données propres au visiteur du site (le fait qu'il soit connecté, ses préférences, ses dernières pages vues...))

	$settings = require __DIR__ . '/../src/settings.php';
	$app = new \Slim\App($settings);

La classe `\Slim\App` est la classe principale de Slim, celle qui lance l'application, c'est grâce à cette classe qu'on configure ce que doit faire l'application. Ici elle utilise des préférences définies dans le fichiers `src/settings.php`

`require __DIR__ . '/../src/dependencies.php';` : configure un annuaire d'objet, pour les retrouver plus facilement plus tard (éviter de faire les new) (Conteneur d'Injection de Dépendance, Dependency Injection Container DIC ici Pimple).

`require __DIR__ . '/../src/middleware.php';` : du code qu'on souhaite exécuter pour chaque requête (ex : faire des statistiques, vérifié les authentification/autorisations)

`require __DIR__ . '/../src/routes.php';` : les Routes, l'association entre une fonction et une URL (nos pages), c'est de la configuration d'un composant qu'on appelle le Router (ici Fast Route)

`$app->run();` : jusque là on configurait, cette ligne exécute le code en fonction de la Requête HTTP (URL...)

### public/.htaccess :

Modifie la configuration d'Apache pour que les URL qui n'existent pas utilisent index.php (les erreurs 404 seront traitées par l'application).

N'a pas d'action sur les fichiers qui n'existent pas, ex : app.css doit rester accessible via Apache.

### vendor/autoload.php et vendor/composer

Autoloader de composer, évite les require de classe

### le reste de vendor

Les dépendances du projet, ex : Slim, Monolog, Pimple...

Ne jamais modifier un fichier dans vendor (en général il n'est pas versionné), peut être être supprimé, écrasé par des mises à jours...

### composer.json et composer.lock

Voir la [doc de composer](docs/composer.md)

