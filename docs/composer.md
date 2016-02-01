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


## composer.json

Enregistre les dépendances et jusqu'à quelle version on est prêt à mettre à jour

Plus d'infos sur [http://composer.json.jolicode.com](http://composer.json.jolicode.com)

#### Versionnage Sémantique

Un numéro de version X.Y.Z, (ex PHP 5.6.17)

X : Version Majeure
Y : Version Mineure
Z : Version Correctif

Version Correctif : correction de bugs ou de sécurité (sauf surprise pas de risque de bugs en montant de version)

Version Mineure : en général, nouveautés qui n'impactent pas le code existant, ex : nouvelles classes, nouvelles méthodes, nouveaux paramètres optionnels, parfois quelques changements (dans ce cas lire le guide de migration), la migration se passe rapidement.

Version Majeure : changements dans l'API, modification/suppression de classes méthodes, migration peut être très longue.

### Exemple

```JSON
{
    "require": {
        "php": ">=5.5.0",
        "slim/slim": "~3.0",
        "slim/php-view": "^2.0",
        "monolog/monolog": "^1.17"
    }
}
```

`"php": ">=5.5.0"` : Au moins PHP 5.5

`"slim/slim": "~3.0"` : Incrémente que les versions correctifs (3.0.3 mais pas 3.1)

`"slim/php-view": "^2.0"` : Incrémente  les versions correctifs et mineures

## composer.lock

Vérouille les versions installées pour éviter les mises à jours lors du passage en production par exemple.

## Faire les mises à jours

`composer update` : va lire le fichier composer.json et faire les charges les versions les plus récentes

## Réinstaller les versions déjà installées (ex : en production)

`composer install` : va lire le fichier composer.lock et réinstaller les mêmes version exactement (limite le risque de bugs)

