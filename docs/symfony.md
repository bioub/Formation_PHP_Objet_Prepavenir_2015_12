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
	
