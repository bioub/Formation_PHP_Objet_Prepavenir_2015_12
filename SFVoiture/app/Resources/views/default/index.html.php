<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Liste des voitures</h2>
        <ul>
            
            <?php foreach($result as $voiture) : ?>
            <li>
                <a href="voiture/<?=htmlspecialchars($voiture->getId())?>"><?=htmlspecialchars($voiture->getMarque())?>
                <?=htmlspecialchars($voiture->getModele())?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
