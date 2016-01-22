# Sécurité des Applications Web

De manière, toutes les données qui sont extérieures à votre application (extérieures aux fichiers PHP) peuvent présenter un risque.

Ex : base de données, URL (requête HTTP), fichiers, accès à des services web (Facebook, Google)...

## Principes Généraux

En sécurité il vaut mieux tout interdire puis autoriser au cas par cas (whitelist) plutôt qu'interdire (blacklist).

Le code PHP ne devrait pas être accesible au travers du serveur web, sous Symfony la racine du serveur est le dossier web, les fichiers PHP ne sont pas à l'intérieur (src).

En développement on a besoin d'afficher les erreurs, en production on logue les erreurs (on ne les affiche pas) :

* l'utilisateur n'en a besoin
* les erreurs du type "Fatal Error" peuvent effrayer (Virus ?)
* une personne malveillante (Hacker) peut tirer des informations intéressante (arborences des fichiers, version de Symfony...)
* afficher les erreurs demande du temps (moins de visiteurs possible sur mon serveur)

Dans Symfony les fichiers de logs sont dans var/logs.

## XSS (Cross-Site Scripting)

### Définition

Se produit quand quelque vient de l'extérieur et fini dans la réponse HTTP (echo).

Par exemple : `echo $maDonneesMySQL`;

Où `$maDonneesMySQL` contenait `<script>alert('XSS')</script>` ou `<img src="monscript.php">`

### Contre-mesure

Toujours échapper au moment du `echo` les données qui proviennent de l'extérieur avec les fonctions :

* strip_tags (retire les balises)
* htmlspecialchars (réencode les caractères <, >, ', ")
