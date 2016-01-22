# Symfony

## Installation

Le squelette d'application de Symfony peut se créer avec composer et la commande :

	cd c:\xampp\htdocs
	composer create-project symfony/framework-standard-edition DOSSIER_A_CREER

A la fin de l'installation, un script interactif nous propose d'éditer les paramètres de l'application.

	Creating the "app/config/parameters.yml" file
	Some parameters are missing. Please provide them.
	database_host (127.0.0.1): 
	database_port (null): 
	database_name (symfony): contacts   
	database_user (root): 
	database_password (null): 
	mailer_transport (smtp): 
	mailer_host (127.0.0.1): 
	mailer_user (null): 
	mailer_password (null): 
	secret (ThisTokenIsNotSoSecretChangeIt): 04eb46846cba76ae7edbe407ae812120ea1927d8
	
La clé `secret` est utilisée par les composants de sécurité de Symfony. Il faut qu'elle soit différente pour chaque application. Vous pouvez en générer une sur : [http://nux.net/secret](http://nux.net/secret)

Attention : vérifier les droits de `var/session`, `var/logs`, `var/cache`. Cf le Symfony Book chapître *Setting up Permissions*

## Vérifier la config du serveur

En ligne de commande : `php bin\symfony_requirements`

Et en PHP Web en affichant la page config.php dans le navigateur.

## Créer des nouvelles pages

Comme dans tous les frameworks Symfony inclus un Router. Une route (une page) est l'association entre une URL et une fonction.

Dans Symfony, les fonctions sont des méthodes d'une Classe Contrôleur et on appelle ces méthodes des actions.

La classe est un regroupement de page par catégorie.

Ex : La catégorie utilisateur et ses pages

* inscription
* connexion
* déconnexion
* changement de mot de passe
* afficher son profil
* modifier ses informations

Pour créer un contrôleur il faut créer une classe dans un Bundle (ex : AppBundle) dans un dossier Controller et suffixée par Controller et en général hérite Symfony\Bundle\FrameworkBundle\Controller\Controller.

Idéalement en ligne de commande :

	php bin\console generate:controller

Exemple :

	MBP-de-Romain:SFContacts romain$ php bin/console generate:controller
	
	                                                
	  Welcome to the Symfony2 controller generator  
	                                                
	
	
	Every page, and even sections of a page, are rendered by a controller.
	This command helps you generate them easily.
	
	First, you need to give the controller name you want to generate.
	You must use the shortcut notation like AcmeBlogBundle:Post
	
	Controller name: AppBundle:Contact
	
	Determine the format to use for the routing.
	
	Routing format (php, xml, yml, annotation) [annotation]: 
	
	Determine the format to use for templating.
	
	Template format (twig, php) [twig]: 
	
	Instead of starting with a blank controller, you can add some actions now. An action
	is a PHP function or method that executes, for example, when a given route is matched.
	Actions should be suffixed by Action.
	
	
	New action name (press <return> to stop adding actions): listAction
	Action route [/list]: /contacts
	Template name (optional) [AppBundle:Contact:list.html.twig]: 
	
	New action name (press <return> to stop adding actions): showAction
	Action route [/show]: /contacts/{id}
	Template name (optional) [AppBundle:Contact:show.html.twig]: 
	
	New action name (press <return> to stop adding actions): 
	
	                             
	  Summary before generation  
	                             
	
	You are going to generate a "AppBundle:Contact" controller
	using the "annotation" format for the routing and the "twig" format
	for templating
	Do you confirm generation [yes]? 
	
	                         
	  Controller generation  
	                         
	
	Generating the bundle code: OK
	
	                                         
	  Everything is OK! Now get to work :).  
	                                         
Pour afficher les pages

Dans le navigateur

Dans l'environnement de dev :

	http://localhost/chemin_jusqua_votre_dossier_symfony/web/app_dev.php/contacts

Dans l'environnement de prod :

	http://localhost/chemin_jusqua_votre_dossier_symfony/web/contacts

Ex :

	http://localhost/SFContacts/web/app_dev.php/contacts
	
Pour obtenir des URLs plus proche de la prod (ex : `http://monsite.com/contacts`) il faut configurer Apache

### Modifier les Routes

Les routes sont définies sous la formes d'annotations (commentaires au dessus des méthodes actions).

On peut modifier les liens par exemple.

Pour ajouter une contrainte sur un paramètre, on ajoute requirements (où [1-9][0-9]* est une expressions régulières qui limite id à des entiers positifs)ex :

```PHP
/**
 * @Route("/societes/{id}", requirements={"id": "[1-9][0-9]*"})
 */
public function showAction($id)
{
    // ...
}
```

### Afficher toutes les routes

	php bin/console debug:router

## Créer un domaine perso 

### 1 - Créer un faux domaine local

Sur Unix, éditer `/etc/hosts`, sous Windows `c:\Windows\System32\drivers\etc\hosts` en étant admin.

Exemple pour un domaine *sfcontacts.local* :

	##
	# Host Database
	#
	# localhost is used to configure the loopback interface
	# when the system is booting.  Do not change this entry.
	##


	# Ajouter ce type de ligne :	
	127.0.0.1		sfcontacts.local

### 2 - Créer un Virtual Host sous Apache

Vérifier le fichiers httpd.conf (ex : `c:\xampp\apache\conf\httpd.conf`) d'Apache, chercher la ligne qui inclus `httpd-vhost.conf` ex : `Include /usr/local/etc/apache2/2.4/extra/httpd-vhosts.conf` et supprimer le commentaire en début de ligne si besoin `#`.

Ajouter localhost si besoin :

	<VirtualHost *:80>
	    DocumentRoot "c:\xampp\htdocs"
	    ServerName localhost
	</VirtualHost>
	
Et une config pour notre domaine :

	<VirtualHost *:80>
	    DocumentRoot "c:\xampp\htdocs\SFContacts\web"
	    ServerName sfcontacts.local
	</VirtualHost>
	
Pour prendre en compte les modifs redémarrer Apache.

Dans le navigateur : http://sfcontacts.local/app_dev.php/contacts doit être accessible.

Par contre l'URL de prod non : http://sfcontacts.local/contacts 

## Cache de Symfony

Pour améliorer les performances, Symfony ne relie pas tout les fichiers à chaque requête, ex : fichiers de config, fichiers Twig, annotations @Route

En production le cache est dit très "agressif", c'est à dire que beaucoup de choses sont mise en cache dont les Routes.

Pour prendre en compte les nouvelles pages il faut vider le cache.

Vider le cache de dev :

	php bin\console cache:clear
	
Vider le cache de prod :
	
	php bin\console cache:clear --env=prod
	
## Twig

Twig est un moteur de template, permet de faire le rendu des vues sans utiliser PHP, mais une syntaxe simplifiée.

### Faire un lien vers une route

Sans paramètre (app_contact_list étant le nom de la route):

	<a href="{{ path('app_contact_list') }}">Retour à la liste</a>
	
Avec un paramètre ({id: 66}, remplace {id} dans l'URL par 66):

	<a href="{{ path('app_contact_show', {id: 66}) }}">Afficher</a>
	
### HTML commun à plusieurs pages

Sur un site on a souvent le même HTML qui s'affiche sur plusieurs pages (balise head, menus, bandeaux...)

Au lieu de faire un `include 'header.php'` puis `include 'footer.php'` comme en PHP classique on faire l'inverse, depuis une page base.html.twig on va inclure la vue.

Pour faire ça il faut hériter d'un fichier de base (Layout) (ici :: veut dire le dossier views dans app/Resources/views):

	{% extends "::base.html.twig" %}
	
Dans ce fichier on a définit des blocks :

	{% block body %}{% endblock %}
	
Ces blocks peuvent être écrasés par une vue :

		
	{% block body %}
	<h1>Welcome to the Societe:list page</h1>
	{% endblock %}
	
## Doctrine

Doctrine est une bibliothèque qui simplifie l'accès aux données. L'implémentation du Design Pattern Data Mapper.

### Créer la base de données

Si la base paramétrées dans parameters.yml n'existe pas encore on peut la créer avec la commande :

	php bin/console doctrine:database:create

### Créer une entité

Une entité est une classe qui contient une donnée de l'application, ex : un contact.

On ici on choisi les noms de propriétés de notre entité, et un type de Mapping, c'est à dire un type de traduction entre PHP <-> Base de données, ex :

string traduit un string PHP en VARCHAR MySQL

Pour les autres types voir :
[http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/basic-mapping.html#doctrine-mapping-types](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/basic-mapping.html#doctrine-mapping-types)

	php bin/console doctrine:generate:entity
	
	Welcome to the Doctrine2 entity generator  
                                             


	This command helps you generate Doctrine2 entities.
	
	First, you need to give the entity name you want to generate.
	You must use the shortcut notation like AcmeBlogBundle:Post.
	
	The Entity shortcut name: AppBundle:Contact
	
	Determine the format to use for the mapping information.
	
	Configuration format (yml, xml, php, or annotation) [annotation]: 
	
	Instead of starting with a blank entity, you can add some fields now.
	Note that the primary key will be added automatically (named id).
	
	Available types: array, simple_array, json_array, object, 
	boolean, integer, smallint, bigint, string, text, datetime, datetimetz, 
	date, time, decimal, float, binary, blob, guid.
	
	New field name (press <return> to stop adding fields): prenom
	Field type [string]: 
	Field length [255]: 40
	Is nullable [false]: 
	Unique [false]: 
	
	New field name (press <return> to stop adding fields): nom
	Field type [string]: 
	Field length [255]: 40
	Is nullable [false]: 
	Unique [false]: 
	
	New field name (press <return> to stop adding fields): email
	Field type [string]: 
	Field length [255]: 80
	Is nullable [false]: true
	Unique [false]: true
	
	New field name (press <return> to stop adding fields): telephone
	Field type [string]: 
	Field length [255]: 20
	Is nullable [false]: true
	Unique [false]: 
	
	New field name (press <return> to stop adding fields): 
	
	                     
	  Entity generation  
	                     
	
	> Generating entity class src/AppBundle/Entity/Contact.php: OK!
	> Generating repository class src/AppBundle/Repository/ContactRepository.php: OK!
	
	                                         
	  Everything is OK! Now get to work :).  
                                         

### Générer le code SQL

Afficher le code à exécuter :

	php bin/console doctrine:schema:update --dump-sql

Exécuter les requêtes après vérification

	php bin/console doctrine:schema:update --force
	
## Modifier une entité

Faites vos modifications dans le code et les annotations, ex:

```PHP
/**
 * @var string
 *
 * @ORM\Column(name="categorie", type="string", length=20)
 */
private $categorie;
```

Puis générer les Getters/Setters, peut se faire avec NetBeans mais le mieux est d'utiliser la commandes suivante (qui sait créer les add...) :

	php bin/console doctrine:generate:entities AppBundle
	
Puis mettre à jour les tables avec les commandes :

	php bin/console doctrine:schema:update --dump-sql
	
	php bin/console doctrine:schema:update --force
	
### Rétrouver les objets depuis la base de données

## TODO Repository

## ParamConverter

Si une URL contient la clé primaire, on peut faire traduire l'URL directement en objet pour le contrôleur :

```PHP
/**
 * @Route("/actualites/{id}")
 */
public function showAction(\AppBundle\Entity\Actualite $actu)
{
    return $this->render('AppBundle:Actualite:show.html.twig', array(
        'actu' => $actu
    ));
}
```
	
## Bundle

Un bundle est un dossier réutisable entre plusieurs projets Symfony.

Idéalement quand un code (pages, fonctions, commandes...) peut être réutiliser dans différentes applications Symfony, on créé un nouveau Bundle, ex :

* pages liées aux utilisateurs (inscription, connexion, déconnexion...)
* pages et formulaires de newsletter
* fonctions twig pour simplifier l'écriture de composants Bootstrap
* commandes de génération de codes
* ...

### Création d'un Bundle

	php bin/console generate:bundle
	
	
                                            
	Welcome to the Symfony bundle generator!  
	                                            
	
	Are you planning on sharing this bundle across multiple applications? [no]: yes
	
	Your application code must be written in bundles. This command helps
	you generate them easily.
	
	Each bundle is hosted under a namespace (like Acme/BlogBundle).
	The namespace should begin with a "vendor" name like your company name, your
	project name, or your client name, followed by one or more optional category
	sub-namespaces, and it should end with the bundle name itself
	(which must have Bundle as a suffix).
	
	See http://symfony.com/doc/current/cookbook/bundles/best_practices.html#bundle-name for more
	details on bundle naming conventions.
	
	Use / instead of \  for the namespace delimiter to avoid any problem.
	
	Bundle namespace: Prepavenir\BootstrapBundle
	
	In your code, a bundle is often referenced by its name. It can be the
	concatenation of all namespace parts but it's really up to you to come
	up with a unique name (a good practice is to start with the vendor name).
	Based on the namespace, we suggest PrepavenirBootstrapBundle.
	
	Bundle name [PrepavenirBootstrapBundle]: 
	
	Bundles are usually generated into the src/ directory. Unless you're
	doing something custom, hit enter to keep this default!
	
	Target Directory [src/]: 
	
	What format do you want to use for your generated configuration?
	
	Configuration format (annotation, yml, xml, php) [xml]: annotation
	
	                     
	  Bundle generation  
	                     
	
	> Generating a sample bundle skeleton into src/Prepavenir/BootstrapBundle OK!
	> Checking that the bundle is autoloaded: OK
	> Enabling the bundle inside app/AppKernel.php: OK
	> Importing the bundle's routes from the app/config/routing.yml file: OK
	
	                                         
	  Everything is OK! Now get to work :).  
	                                         
	
### Activer un bundle

Il faut ajouter une ligne du genre :

	new Prepavenir\BootstrapBundle\PrepavenirBootstrapBundle(),
	
Dans le fichier app/AppKernel.

### Activer les routes (pages) d'un bundle

Dans le fichiers app/config/routing.yml (dans tous les environnements dev, prod...), ou dans app/config/routing_dev.yml (que dans l'environnement de dev).

	prepavenir_bootstrap:
	  resource: "@PrepavenirBootstrapBundle/Controller/"
	  type:     annotation
	  prefix:   /
	  
### Copier le dossier public d'un bundle ou créer un lien symbolique

Dans un bundle on peut créer un dossier Resources/public qui contient des fichiers à placer dans web (ex: CSS, images, JavaScript), permet de limiter le nombre de manipulation de fichier à faire, ex: BootstrapBundle contient déjà les fichiers CSS.

Pour copier les fichiers :

	php bin/console assets:install
	
Ou créer des liens symboliques (raccourcis mais que sur Mac/Linux) :

	php bin/console assets:install --symlink
	

## Récupérer un projet Symfony existant

* Rappatrier les sources
* S'il n'y pas de dossier vendor, faire un `composer install`, s'il n'y a pas non plus de parameters.yml, `composer install` vous propose de le recréer
* Recreer si besoin le projet sous NetBeans
  * S'il y a un dossier nbproject (File -> Open Project)
  * Sinon (File -> New Project -> PHP with Existing Sources)
* Recréer la base de données si besoin `php bin/console doctrine:database:create`
* Recréer ou modifier les tables si besoins `php bin/console doctrine:schema:update --dump-sql` puis `php bin/console doctrine:schema:update --force`
* Pour lancer le projet `php bin/console server:run` puis aller à l'adresse http://127.0.0.1:8000/ (pas besoin dans ce cas de app_dev.php car on est déjà sur un serveur de développement)