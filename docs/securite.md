# Sécurité des Applications Web

De manière, toutes les données qui sont extérieures à votre application (extérieures aux fichiers PHP) peuvent présenter un risque.

Ex : base de données, URL (requête HTTP), fichiers, accès à des services web (Facebook, Google)...

## XSS (Cross-Site Scripting)

### Définition

Se produit quand quelque vient de l'extérieur et fini dans la réponse HTTP (echo).

Par exemple : `echo $maDonneesMySQL`;

Où `$maDonneesMySQL` contenait `<script>alert('XSS')</script>` ou `<img src="monscript.php">`

### Contre-mesure

Toujours échapper au moment du `echo` les données qui proviennent de l'extérieur avec les fonctions :

* strip_tags (retire les balises)
* htmlspecialchars (réencode les caractères <, >, ', ")
