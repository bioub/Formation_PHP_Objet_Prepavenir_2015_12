# Git
Un programme qui permet de versionner des fichiers texte, en particulier du code.

## Principales commandes

### git clone
Permet de cloner un repository git sur une autre machine
Ex : git clone https://github.com/bioub/Formation_PHP_Objet_Prepavenir_2015_12.git

### git status
Permet de voir quels sont les changements depuis la dernière version

### git add unFichier
Permet d'ajouter un fichier à la prochaine version
Ex : git add README.md
Ex (permet de tout ajouter) : git add .
Ex (que les fichiers HTML) : git add *.html 

### git commit -m "Un message"
Permet de créer une nouvelle version (et donc pouvoir revenir à l'avenir à cette version), idéalement il faut "commiter" des choses qui fonctionnent.
Ex : git commit -m "Ajout des principales commandes à la docs"

### git push
Permet de synchroniser nos 2 repositories
Ex : git push
Ex (avec des noms) : git push origin master
