# MySQL

Un Système de Gestion de Bases de Données Relationnelles (SGBDR) comme MySQL (ou Oracle, PostgreSQL, SQL Server, Access, Filemaker, DB2) permet de stocker des gros volumes de données tout en restant performant.

On peut se représenter les données sous la forme d'un tableau, mais contrairement à Excel par exemple les données ne sont pas stocké à une position précise (Excel : ligne 3 colonne B).

## Parallèle avec Excel

| MySQL  | Excel |
| ------------- | ------------- |
| SGBDR  | Tableur  |
| Base de données  | Fichier (Classeur)  |
| Table  | Onglet (Feuille Calcul)  |
| Colonne  | Colonne  |
| Enregistrement  | Ligne  |
| SQL  | ~ Formule  |
| Clé primaire  | Numéro Ligne  |
| Clé étrangère  | Lien vers un onglet  |
| Index  |   |
| Déclencheur  |   |
| Procédures stockées  |   |

## SQL

Langage qui permet de communiquer avec une base de données relationnelle.

### Insertion

```SQL
INSERT INTO nom_table (nom_colonne, nom_autre_colonne)
VALUES ('Valeur de la col 1', 'Val col 2')
```

### Lecture

Récupérer tous les enregistrements

```SQL
SELECT nom_colonne, nom_autre_colonne
FROM nom_table
```

On peut aussi écrire toutes les colonnes avec * (déconseillé dans le code PHP)

```SQL
SELECT *
FROM nom_table
```

Pour trier on ajoute une clause ORDER BY

```SQL
SELECT nom_colonne, nom_autre_colonne
FROM nom_table
ORDER BY nom_colonne
```

On peut aussi trier de manière décroissante

```SQL
SELECT nom_colonne, nom_autre_colonne
FROM nom_table
ORDER BY nom_colonne DESC
```

On peut aussi trier avec plusieurs critères

```SQL
SELECT nom_colonne, nom_autre_colonne
FROM nom_table
ORDER BY nom_colonne, nom_autre_colonne
```

Pour limiter le nombre d'enregistrement on utilise la clause LIMIT (attention LIMIT n'est pas standard, ex n'existe pas sous ORACLE)

```SQL
SELECT nom_colonne, nom_autre_colonne
FROM nom_table
LIMIT nb_enregistrement
```

Bonne pratique : toujours mettre une clause LIMIT (en production pas de LIMIT peut faire tomber un serveur)

On peut cumuler avec les autres clause :

```SQL
SELECT nom_colonne, nom_autre_colonne
FROM nom_table
ORDER BY nom_colonne
LIMIT nb_enregistrement
```

On peut aussi ajouter un décalage :
```SQL
SELECT nom_colonne, nom_autre_colonne
FROM nom_table
LIMIT nb_enregistrement, decalage
```

Ex : On veut la page 3 de voiture (10 enregistrements à partir du 20e)
```SQL
SELECT marque, modele
FROM voiture
LIMIT 10, 20
```

Filtrer par critères
```SQL
SELECT nom_colonne, nom_autre_colonne
FROM nom_table
WHERE criteres
```

Ex : toutes les voitures de marques Renault
```SQL
SELECT marque, modele
FROM voiture
WHERE marque = 'Renault'
```

Il existe plein d'opérateurs :

* `=`
* `!=` ou `<>`
* `>`, `>=`, `<`, `<=`
* `BETWEEN valeur AND autre_valeur`
* `LIKE 'R*'` (tout ce qui commence par R)

L'ordre est important : SELECT, FROM, WHERE, ORDER BY, LIMIT

Au final :

```SQL
SELECT marque, modele
FROM voiture
WHERE marque = 'Renault'
ORDER BY modele
LIMIT 10
```

### Suppression

```SQL
DELETE FROM nom_table
WHERE criteres
```

Ex :
```SQL
DELETE FROM voiture
WHERE id = 3
```

### Modification

```SQL
UPDATE nom_table
SET nom_colonne = 'nouvelle valeur', nom_autre_colonne = 'autre valeur'
WHERE criteres
```

Ex :
```SQL
UPDATE voiture
SET marque = 'Renault'
WHERE id = 1
```
