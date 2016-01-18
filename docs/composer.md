# Composer

Composer est un programme PHP qui permet de télécharger des dépendances. Ex : le framework Slim et ses dépendances (ex : `Psr\Http\Message`)

Plutôt que de télécharger chaque dépendance manuellement puis de les installer manuellement et de créer un autoloader manuellement.

Toutes les commandes à partir de maintenant s'exécutent à partir de la racine du projet. La commande `cd`(Change Directory) permet de se placer à la racine, ex : `cd c:\xampp\htdocs\SlimHelloworld` (pour obtenir le chemin d'un fichier un d'un dossier, vous pouvez le glisser dans la fenetre de commandes)

## Ajouter une dépendance à un projet

`composer require NOM_DE_LA_DEPENDANCE`

Pour connaitre le nom de votre dépendance :

* lire la doc du projet (ex : Slim)
* chercher sur Packagist.org (annuaire de dépendance pour composer)

## Création d'un squelette

`composer create-project NOM_DE_LA_DEPENDANCE CHEMIN_VERS_LE_PROJET`